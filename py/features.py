# SearchNotice SDK feature factory

from feature.base_feature import SearchNoticeBaseFeature
from feature.test_feature import SearchNoticeTestFeature


def _make_feature(name):
    features = {
        "base": lambda: SearchNoticeBaseFeature(),
        "test": lambda: SearchNoticeTestFeature(),
    }
    factory = features.get(name)
    if factory is not None:
        return factory()
    return features["base"]()
