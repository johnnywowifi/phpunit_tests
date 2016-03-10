<?php
require_once(__DIR__ . "/TooFastException.php");
/**
 * Eigenschaften
 * ps
 * farbe
 * typ
 * kmh
 * beschleunigen()
 * bremsen()
 * umlackieren()
 */

/**
 * Description of Auto
 *
 * @author kraftla
 */
class Auto {
    /**
     * Typ des Auto
     * @var string
     */
    public $typ;
    
    /**
     * PS des Auto
     * @var int PS des Auto
     */
    private $ps;
    
    /**
     * Die Farbe des Autos
     * @var string 
     */
    private $farbe;
    
    /**
     * Aktuelle Geschwindigkeit des Auto
     * @var int
     */
    private $kmh;
    
    /**
     * Erzeugt Auto mit Typ
     * @param string $typ Typ des Auto
     */
    public function __construct($typ)
    {
        $this->typ = $typ;
    }
    
    /**
     * Beschleunigt Auto um xxx kmh
     * Das Auto kann beliebig beschleunigt werden
     * Es gibt keine Einschränkung
     * @param int $kmh Der Beschleunigungswert, Standard ist 1
     * @return int aktuelle Geschwindigkeit in kmh
     */
    public function beschleunigen($kmh = 1)
    {
        $this->kmh += $kmh;
        return $this->kmh;
    }
    
    /**
     * Bremst Auto um xxx kmh
     * Das Auto kann maximal zum stillstand gebracht werden
     * @param int $kmh Der bremswert, Standard ist 1 kmh
     * @return int Aktuelle Geschwindigkeit in kmh
     */
    public function bremsen($kmh = 1)
    {
        $this->kmh -= $kmh;
        if($this->kmh < 0) {
            $this->kmh = 0;
        }
        return $this->kmh;
    }
    
    /**
     * Gibt dem Auto eine neue Farbe
     * Die <strong>Farbe rot</strong> ist grundsätzlich nicht erlaubt 
     * und verändert die Farbe des Auto nicht
     * @param string $farbe Die gewünschte Farbe, ausser rot
     * @return boolean|string Die aktuelle Autofarbe
     */
    public function umlackieren($farbe)
    {
        if($farbe === "rot") {
            return false;
        }
        $this->farbe = $farbe;
        return $farbe;
    }
    
    public function getTyp() {
        return $this->typ;
    }

    public function getPs() {
        return $this->ps;
    }

    public function getFarbe() {
        return $this->farbe;
    }

    public function getKmh() {
        return $this->kmh;
    }

    public function setTyp($typ) {
        $this->typ = $typ;
        return $this;
    }

    public function setPs($ps) {
        $this->ps = $ps;
        return $this;
    }

    public function setFarbe($farbe) {
        $this->farbe = $farbe;
        return $this;
    }

    public function setKmh($kmh) {
        if($kmh > 600) {
            throw new TooFastException("Geschwindigkeit zu hoch");
        }
        $this->kmh = $kmh;
        return $this;
    }


}
