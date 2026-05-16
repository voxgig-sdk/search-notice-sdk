<?php
declare(strict_types=1);

// SearchNotice SDK utility registration

require_once __DIR__ . '/../core/UtilityType.php';
require_once __DIR__ . '/Clean.php';
require_once __DIR__ . '/Done.php';
require_once __DIR__ . '/MakeError.php';
require_once __DIR__ . '/FeatureAdd.php';
require_once __DIR__ . '/FeatureHook.php';
require_once __DIR__ . '/FeatureInit.php';
require_once __DIR__ . '/Fetcher.php';
require_once __DIR__ . '/MakeFetchDef.php';
require_once __DIR__ . '/MakeContext.php';
require_once __DIR__ . '/MakeOptions.php';
require_once __DIR__ . '/MakeRequest.php';
require_once __DIR__ . '/MakeResponse.php';
require_once __DIR__ . '/MakeResult.php';
require_once __DIR__ . '/MakePoint.php';
require_once __DIR__ . '/MakeSpec.php';
require_once __DIR__ . '/MakeUrl.php';
require_once __DIR__ . '/Param.php';
require_once __DIR__ . '/PrepareAuth.php';
require_once __DIR__ . '/PrepareBody.php';
require_once __DIR__ . '/PrepareHeaders.php';
require_once __DIR__ . '/PrepareMethod.php';
require_once __DIR__ . '/PrepareParams.php';
require_once __DIR__ . '/PreparePath.php';
require_once __DIR__ . '/PrepareQuery.php';
require_once __DIR__ . '/ResultBasic.php';
require_once __DIR__ . '/ResultBody.php';
require_once __DIR__ . '/ResultHeaders.php';
require_once __DIR__ . '/TransformRequest.php';
require_once __DIR__ . '/TransformResponse.php';

SearchNoticeUtility::setRegistrar(function (SearchNoticeUtility $u): void {
    $u->clean = [SearchNoticeClean::class, 'call'];
    $u->done = [SearchNoticeDone::class, 'call'];
    $u->make_error = [SearchNoticeMakeError::class, 'call'];
    $u->feature_add = [SearchNoticeFeatureAdd::class, 'call'];
    $u->feature_hook = [SearchNoticeFeatureHook::class, 'call'];
    $u->feature_init = [SearchNoticeFeatureInit::class, 'call'];
    $u->fetcher = [SearchNoticeFetcher::class, 'call'];
    $u->make_fetch_def = [SearchNoticeMakeFetchDef::class, 'call'];
    $u->make_context = [SearchNoticeMakeContext::class, 'call'];
    $u->make_options = [SearchNoticeMakeOptions::class, 'call'];
    $u->make_request = [SearchNoticeMakeRequest::class, 'call'];
    $u->make_response = [SearchNoticeMakeResponse::class, 'call'];
    $u->make_result = [SearchNoticeMakeResult::class, 'call'];
    $u->make_point = [SearchNoticeMakePoint::class, 'call'];
    $u->make_spec = [SearchNoticeMakeSpec::class, 'call'];
    $u->make_url = [SearchNoticeMakeUrl::class, 'call'];
    $u->param = [SearchNoticeParam::class, 'call'];
    $u->prepare_auth = [SearchNoticePrepareAuth::class, 'call'];
    $u->prepare_body = [SearchNoticePrepareBody::class, 'call'];
    $u->prepare_headers = [SearchNoticePrepareHeaders::class, 'call'];
    $u->prepare_method = [SearchNoticePrepareMethod::class, 'call'];
    $u->prepare_params = [SearchNoticePrepareParams::class, 'call'];
    $u->prepare_path = [SearchNoticePreparePath::class, 'call'];
    $u->prepare_query = [SearchNoticePrepareQuery::class, 'call'];
    $u->result_basic = [SearchNoticeResultBasic::class, 'call'];
    $u->result_body = [SearchNoticeResultBody::class, 'call'];
    $u->result_headers = [SearchNoticeResultHeaders::class, 'call'];
    $u->transform_request = [SearchNoticeTransformRequest::class, 'call'];
    $u->transform_response = [SearchNoticeTransformResponse::class, 'call'];
});
