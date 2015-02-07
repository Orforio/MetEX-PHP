#encoding: utf-8
@active

Feature: Stations - Image slideshow
  As a passenger,
  I want to see a slideshow of images relating to the station I'm at
  So I can better understand the accompanying text description
  
  Background:
    Given the fixtures are in place
    
#  Scenario: Images load from the database
#    When I visit "/stations/view/11"
#    Then I see a 3-photo slideshow
#    And the following photos are on the page:
#      | /media/images/photos/4/11-1.jpg |
#      | /media/images/photos/4/11-2.jpg |
#      | /media/images/photos/4/11-3.jpg |
    
 # Scenario: Images scroll automatically
 #   pending
    
 # Scenario: Images can be selected
 #   pending
    
 # Scenario: Slideshow can be halted and restarted
 #   pending
    
  Scenario: Image is missing
    When I visit "/stations/view/991"
    Then the following photos are on the page:
      | /media/images/photo-not-available.jpg |