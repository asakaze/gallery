<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use App\Models\Album;
use App\Models\Picture;

class AlbumUnitTest extends TestCase
{
    use DatabaseTransactions;

    protected $album;

    public function setUp()
    {
        parent::setUp();
        $this->album = factory(Album::class, 1)->create()->first();
    }

    public function tearDown()
    {
        $this->album = null;
        parent::tearDown();
    }

    public function test_album_notInitialized()
    {
        $this->assertEquals(new Collection, $this->album->pictures);
    }

    public function test_album_initialized()
    {
        $pictures = factory(Picture::class, 2)->create();
        $this->album->pictures()->saveMany($pictures);

        $this->assertCount(2, $this->album->pictures);
    }
}
