<?php
class Form
{
  private $data;
  public $surroundStart = "div class='form-group mb-3'";
  public $surroundEnd = "div";

  public function __construct($data = array())
  {
    $this->data = $data;
  }

  // Retourne les tags entourant l'input
  private function surround($content)
  {
    return "<{$this->surroundStart}>$content</{$this->surroundEnd}>";
  }

  // Récupère la valeur d'un input
  private function getValue($index)
  {
    return isset($this->data[$index]) ? $this->data[$index] : null;
  }

  // Retourne un input
  public function input($label, $name, $type, $step = "")
  {
    return $this->surround('
    <label for="' . $name . '">' . $label . '</label>
    <input type="' . $type . '" class="form-control" name="' . $name . '" id="' . $name . '" value="' . $this->getValue($name) . '"' . ($step != "" ? "step=" . $step : "") . ' required>');
  }

  // Retoune un input de selection multiple
  public function select($columns, $name, $label, $idSelect)
  {
    return $this->surround('
      <label for="' . $idSelect . '">' . $label . '</label>
      <select class="form-select" multiple aria-label="multiple select example" name="infoModule' . $idSelect . '[]" id="' . $name . $idSelect . '">
        <option value="' . $columns[5] . '">Température</option>
        <option value="' . $columns[6] . '">Durée de fonctionnement</option>
        <option value="' . $columns[7] . '">Nombre de données envoyées</option>
      </select>');
  }

  // Retourne un input de typer number égale à 0 ou 1
  public function stateInput($label, $name)
  {
    return $this->surround('
    <label for="' . $name . '">' . $label . '</label>
    <input type="number" class="form-control" name="' . $name . '" id="' . $name . '" value="' . $this->getValue($name) . '" min="0" max="1" step="1" required>');
  }

  // Retourne un bouton de validation
  public function submit($value, $color, $id = "#", $icon = "")
  {
    return "<button type='submit' id='$id' class='btn btn-outline-$color me-3 mt-1'>$icon $value</button>";
  }

  // Retourne un lien de sous forme de bouton
  public function link($value, $color, $href, $array, $icon = "")
  {
    return "<a class='btn btn-$color me-3 mt-1' href='$href?id=" . $array["id"] . "' role='button'>$icon $value</a>";
  }
}
