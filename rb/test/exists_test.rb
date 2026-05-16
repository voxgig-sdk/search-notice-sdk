# SearchNotice SDK exists test

require "minitest/autorun"
require_relative "../SearchNotice_sdk"

class ExistsTest < Minitest::Test
  def test_create_test_sdk
    testsdk = SearchNoticeSDK.test(nil, nil)
    assert !testsdk.nil?
  end
end
