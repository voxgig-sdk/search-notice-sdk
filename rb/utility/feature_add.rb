# SearchNotice SDK utility: feature_add
module SearchNoticeUtilities
  FeatureAdd = ->(ctx, f) {
    ctx.client.features << f
  }
end
