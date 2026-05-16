<?php
declare(strict_types=1);

// SearchNotice SDK utility: feature_add

class SearchNoticeFeatureAdd
{
    public static function call(SearchNoticeContext $ctx, mixed $f): void
    {
        $ctx->client->features[] = $f;
    }
}
