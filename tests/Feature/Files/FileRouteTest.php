<?php

namespace Tests\Feature\Files;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use MarkDingemanse\Beyondlove\Services\Image;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class FileRouteTest extends TestCase
{
    public function testGetRandomFile()
    {
        $response = $this->get('/random');

        $response->assertStatus(200);
    }

    public function testUploadView()
    {
        $response = $this->get('/upload?waifu=password');

        $response->assertStatus(200);
        $response->assertViewIs('upload.file_upload');

        $responseBad = $this->get('/upload?waifu=error');

        $responseBad->assertStatus(200);
        $responseBad->assertViewIs('index');
    }

    public function testUpload()
    {
        Storage::fake('public');
        $image = new Image();

        $response = $this->json('POST', '/upload?waifu=password', [
            'file' => UploadedFile::fake()->create(Str::random() . '.jpg')
        ]);

        $response->assertStatus(302);
        Storage::disk('public')->assertExists('img/' . $image->buildFileName('jpg'));
    }
}
