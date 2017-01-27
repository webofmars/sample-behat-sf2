Feature: Homepage shows the graphs list
  I need to be able to see the graphs list

  Scenario: I can see the graphs list
    When I go to "/"
    Then I should see "Graphs list"

  Scenario: I can't see the graphs list
    When I go to "/random"
    Then I should not see "Graphs list"
