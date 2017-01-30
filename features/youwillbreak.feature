Feature: take a screenshot of failled test
  This test should always fail in order to take a screenshoot

  Scenario: I will fail on homepage
    When I go to "/"
    Then I should see "Something that dosen't exist yet"

