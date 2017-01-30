Feature: I should be able to create a new graph from the homepage
 In order to create a new graph
 As a normal user
 I should be able to create a new graph
  
  @javascript
  Scenario: I can see "Graph creation" after clicking on "Create a new graph"
    When I go to "/"
    When I follow "Create a new graph"
    Then I should see "Graph creation"

  @javascript
  Scenario: I can create a new graph by filling the form
    When I go to "/new"
    And I fill in "sosimplegraphsbundle_graph_name" with "name_xyz"
    And I fill in "sosimplegraphsbundle_graph_description" with "Ceci est une belle description mais sans interet !"
    When I press "Create"
    Then I should see "Name"
  
