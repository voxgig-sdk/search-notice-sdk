<?php
declare(strict_types=1);

// SearchNotice SDK feature factory

require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/feature/TestFeature.php';


class SearchNoticeFeatures
{
    public static function make_feature(string $name)
    {
        switch ($name) {
            case "base":
                return new SearchNoticeBaseFeature();
            case "test":
                return new SearchNoticeTestFeature();
            default:
                return new SearchNoticeBaseFeature();
        }
    }
}
