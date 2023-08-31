<?php

namespace App\Foundation\Http\Jobs;

use Illuminate\Routing\ResponseFactory;

class RespondWithJsonErrorJob extends RespondWithJsonJob
{
    public function __construct(array $errors = [], int $status = 422, array $headers = [], int $options = 0)
    {
        $this->content = [
            'errors' => [
                $errors
            ],
        ];

        $this->status = $status;
        $this->headers = $headers;
        $this->options = $options;
    }

    public function handle(ResponseFactory $response)
    {
        return $response->json($this->content, $this->status, $this->headers, $this->options);
    }
}
