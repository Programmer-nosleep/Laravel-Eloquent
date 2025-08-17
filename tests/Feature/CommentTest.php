<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comments;
use DateTime;

class CommentTest extends TestCase
{
    public function testCreateComment()
    {
        $comment = new Comments();
        $comment->email = "zani@example.com";
        $comment->title = "Simple Title";
        $comment->comment = "Sample Comment";
        $comment->created_at = new DateTime();
        $comment->updated_at = new DateTime();
        $comment->save();

        self::assertNotNull($comment->id);
    }

    public function testDefaultAttributeValues()
    {
        $comment = new Comments();
        $comment->email = "zani@example.com";
        $comment->save();

        self::assertNotNull($comment->id);
        self::assertNotNull($comment->title);
    }
}
