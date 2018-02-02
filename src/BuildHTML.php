<?php

namespace TripSorter;

/**
 * Class BuildHTML
 * 
 */
class BuildHTML
{
    /**
     * BuildHTML constructor.
     */
    public function __construct()
    {
        
    }
    
    /**
     *  sorted Boarding cards
     *
     */
    public function Boarding($sorted_cards)
    {
        
        foreach ($sorted_cards as $card) {
            switch ($card['Transportation']) {
                case "Train":
                    $html_string .= $this->Train($card);
                    break;
                case "Bus":
                    $html_string .= $this->Bus($card);
                    break;
                case "Plane":
                    $html_string .= $this->Plane($card);
                    break;
            }
        }
        
        return $html_string . $this->arrivalMsg();
    }
    
    private function Train($card)
    {
        return "\n Take train $card[Transportation_number] from $card[Departure] to $card[Arrival]  "  . $this->Seat($card) ;
    }
    
    private function Bus($card)
    {
        return "\n Take the airport bus from $card[Departure] to $card[Arrival]." . $this->Seat($card) ;
    }
    
    private function Plane($card)
    {
        return "\n From $card[Departure],  take flight $card[Transportation_number] to $card[Arrival]. " . $this->Gate($card) . $this->Seat($card) .$this->Baggage($card);
    }
    
    private function arrivalMsg()
    {
        return " You have arrived at your final destination";
    }
    
    private function Baggage($card)
    {
    	return !empty($card['Baggage']) ? ", Baggage drop at ticket counter $card[Baggage]" : ", Baggage will we automatically transferred from your last leg \n";
    }
    
    private function Gate($card)
    {
        return empty($card['Gate']) ?: "Gate $card[Gate]";
    }
    
    private function Seat($card)
    {
        return !empty($card['Seat']) ? " Sit in seat $card[Seat]" : "No seat assignment  ";
    }
}