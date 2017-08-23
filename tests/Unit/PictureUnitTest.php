<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use App\Models\Album;
use App\Models\Picture;

class PictureUnitTest extends TestCase
{
    use DatabaseTransactions;

    protected $picture;

    public function setUp()
    {
        parent::setUp();
        $this->picture = factory(Picture::class, 1)->create()->first();
    }

    public function tearDown()
    {
        $this->picture = null;
        parent::tearDown();
    }

    public function test_album_notInitialized()
    {

        $picture = new Picture();
        $this->assertEquals(new Collection, $picture->album()->get());
    }

    public function test_album_initialized()
    {
        $this->assertTrue(Album::all()->contains($this->picture->album));
    }
}
