<?php

// config for HappyToDev/FilamentComments
return [
    /*
     * The comment class that should be used to store and retrieve
     * the comments.
     */
    //'comment_class' => \BeyondCode\Comments\Comment::class,
    'comment_class' => \App\Models\Comment::class,

    /*
     * The user model that should be used when associating comments with
     * commentators. If null, the default user provider from your
     * Laravel authentication configuration will be used.
     */
    'user_model' => null,
];
