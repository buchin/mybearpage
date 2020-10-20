<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Models\Note;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/', function () {
    if (
        request()
            ->file('textbundle')
            ->isValid()
    ) {
        $filename = Note::getFilename(request()->textbundle);
    } else {
        return 'Invalid file';
    }

    $zipFile = new \PhpZip\ZipFile();
    $zipFile->openFromString(
        file_get_contents(request()->textbundle->getPathName())
    );

    $info = json_decode($zipFile[$filename . '/info.json'], true);

    $bear_id =
        $info['net.shinyfrog.bear']['bear-note-unique-identifier'] ?: false;

    if ($bear_id) {
        $note = new Note();
        $note->bear_id = $bear_id;

        $note->text = $zipFile[$filename . '/text.markdown'];
        $note->title = str_replace('# ', '', strtok($note->text, "\n"));

        $note->save();
        foreach ($zipFile->getListFiles() as $file) {
            if (Str::contains($file, 'assets/')) {
                $assetname = str_replace($filename . '/assets/', '', $file);

                if (!empty($assetname)) {
                    $note
                        ->addMediaFromString($zipFile[$file])
                        ->usingName($assetname)
                        ->usingFileName($assetname)
                        ->toMediaCollection('assets');
                }
            }
        }

        $note->save();

        foreach ($note->getMedia('assets') as $media) {
            $note->text = str_replace(
                'assets/' . rawurlencode($media->name),
                $media->getUrl(),
                $note->text
            );
        }

        $note->html = Markdown::convertToHtml($note->text);
        $note->save();
    }

    return redirect()->route('note', $note);
});

Route::get('/notes/{note}', function (Note $note) {
    $data = [];
    $data['note'] = $note;
    return view('note', $data);
})->name('note');
