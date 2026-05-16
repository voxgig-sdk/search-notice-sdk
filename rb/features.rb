# SearchNotice SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/test_feature'


module SearchNoticeFeatures
  def self.make_feature(name)
    case name
    when "base"
      SearchNoticeBaseFeature.new
    when "test"
      SearchNoticeTestFeature.new
    else
      SearchNoticeBaseFeature.new
    end
  end
end
