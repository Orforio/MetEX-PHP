#encoding: utf-8

Feature: Stations - Previous/Next station navigation
  As a passenger,
  I want to be able to view the next and previous stations to the one I'm on
  So that I can travel the line sequentially
  
  Background:
    Given the fixtures are in place
    
  Scenario: Station in the middle of a line
    When I visit "/stations/view/10"
    Then I see the "#nav-station-down-1" element "Pelleport"
    And I see the "#nav-station-up-1" element "Porte des Lilas"
    When I press the "Porte des Lilas" link
    Then the URL should be "/stations/view/9"
    
  Scenario: Simple line with only two termini - Up terminus
    When I visit "/stations/view/9"
    Then I see the "#nav-station-down-1" element "Saint-Fargeau"
    And I see the "#nav-station-up-1" element "Terminus"
    And I cannot click on "Terminus"
    When I press the "Saint-Fargeau" link
    Then the URL should be "/stations/view/10"
    
  Scenario: Simple line with only two termini - Down terminus
    When I visit "/stations/view/12"
    Then I see the "#nav-station-down-1" element "Terminus"
    And I see the "#nav-station-up-1" element "Pelleport"
    And I cannot click on "Terminus"
    When I press the "Pelleport" link
    Then the URL should be "/stations/view/11" 
  
  Scenario: Line with a loop in the middle - Branching station
    When I visit "/stations/view/79"
    Then I see the "#nav-station-up-1" element "Église d'Auteuil"
    And I see the "#nav-station-up-2" element "Mirabeau"
    And I see the "#nav-station-down-1" element "Charles Michel"
    When I press the "Mirabeau" link
    Then the URL should be "/stations/view/78"
    
  Scenario: Line terminating in a loop - Penultimate station
    When I visit "/stations/view/18"
    Then I see the "#nav-station-up-1" element "Botzaris"
    And I see the "#nav-station-down-1" element "Pré Saint-Gervais"
    When I press the "Pré Saint-Gervais" link
    Then the URL should be "/stations/view/19"
    
  Scenario: Line terminating in a loop - Terminus station
    When I visit "/stations/view/19"
    Then I see the "#nav-station-up-1" element "Danube"
    And I see the "#nav-station-up-2" element "Place des Fêtes"
    And I see the "#nav-station-down-1" element "Terminus"
    And I cannot click on "Terminus"
    When I press the "Danube" link
    Then the URL should be "/stations/view/20"
  
  Scenario: Line with one or more branches - Terminus station
    When I visit "/stations/view/991"
    Then I see the "#nav-station-up-1" element "Terminus"
    And I see the "#nav-station-down-1" element "Guy Môquet"
    And I cannot click on "Terminus"
    When I press the "Guy Môquet" link
    Then the URL should be "/stations/view/992"
    
  Scenario: Line with one or more branches - Fork station
    When I visit "/stations/view/995"
    Then I see the "#nav-station-up-1" element "Guy Môquet"
    And I see the "#nav-station-up-2" element "Brochant"
    And I see the "#nav-station-down-1" element "Place de Clichy"
    When I press the "Brochant" link
    Then the URL should be "/stations/view/994"
    
  Scenario: Line with one or more branches - Post-fork station
    When I visit "/stations/view/994"
    Then I see the "#nav-station-up-1" element "Asnières Gennevilliers"
    And I see the "#nav-station-down-1" element "La Fourche"
    When I press the "La Fourche" link
    Then the URL should be "/stations/view/995"