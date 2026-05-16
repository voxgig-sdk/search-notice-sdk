# SearchNotice SDK utility registration
require_relative '../core/utility_type'
require_relative 'clean'
require_relative 'done'
require_relative 'make_error'
require_relative 'feature_add'
require_relative 'feature_hook'
require_relative 'feature_init'
require_relative 'fetcher'
require_relative 'make_fetch_def'
require_relative 'make_context'
require_relative 'make_options'
require_relative 'make_request'
require_relative 'make_response'
require_relative 'make_result'
require_relative 'make_point'
require_relative 'make_spec'
require_relative 'make_url'
require_relative 'param'
require_relative 'prepare_auth'
require_relative 'prepare_body'
require_relative 'prepare_headers'
require_relative 'prepare_method'
require_relative 'prepare_params'
require_relative 'prepare_path'
require_relative 'prepare_query'
require_relative 'result_basic'
require_relative 'result_body'
require_relative 'result_headers'
require_relative 'transform_request'
require_relative 'transform_response'

SearchNoticeUtility.registrar = ->(u) {
  u.clean = SearchNoticeUtilities::Clean
  u.done = SearchNoticeUtilities::Done
  u.make_error = SearchNoticeUtilities::MakeError
  u.feature_add = SearchNoticeUtilities::FeatureAdd
  u.feature_hook = SearchNoticeUtilities::FeatureHook
  u.feature_init = SearchNoticeUtilities::FeatureInit
  u.fetcher = SearchNoticeUtilities::Fetcher
  u.make_fetch_def = SearchNoticeUtilities::MakeFetchDef
  u.make_context = SearchNoticeUtilities::MakeContext
  u.make_options = SearchNoticeUtilities::MakeOptions
  u.make_request = SearchNoticeUtilities::MakeRequest
  u.make_response = SearchNoticeUtilities::MakeResponse
  u.make_result = SearchNoticeUtilities::MakeResult
  u.make_point = SearchNoticeUtilities::MakePoint
  u.make_spec = SearchNoticeUtilities::MakeSpec
  u.make_url = SearchNoticeUtilities::MakeUrl
  u.param = SearchNoticeUtilities::Param
  u.prepare_auth = SearchNoticeUtilities::PrepareAuth
  u.prepare_body = SearchNoticeUtilities::PrepareBody
  u.prepare_headers = SearchNoticeUtilities::PrepareHeaders
  u.prepare_method = SearchNoticeUtilities::PrepareMethod
  u.prepare_params = SearchNoticeUtilities::PrepareParams
  u.prepare_path = SearchNoticeUtilities::PreparePath
  u.prepare_query = SearchNoticeUtilities::PrepareQuery
  u.result_basic = SearchNoticeUtilities::ResultBasic
  u.result_body = SearchNoticeUtilities::ResultBody
  u.result_headers = SearchNoticeUtilities::ResultHeaders
  u.transform_request = SearchNoticeUtilities::TransformRequest
  u.transform_response = SearchNoticeUtilities::TransformResponse
}
