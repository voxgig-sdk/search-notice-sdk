# ProjectName SDK exists test

import pytest
from searchnotice_sdk import SearchNoticeSDK


class TestExists:

    def test_should_create_test_sdk(self):
        testsdk = SearchNoticeSDK.test(None, None)
        assert testsdk is not None
