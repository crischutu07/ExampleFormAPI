<?php
// Namespace
namespace Example\ExampleFormAPI;
// Import Plugin from Example\ExampleFormAPI\Form
use Example\ExampleFormAPI\Form\Form;
use Example\ExampleFormAPI\Form\SimpleForm;

// Plugin Base
use pocketmine\plugin\PluginBase;
// Commands
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
// Event
use pocketmine\event\Listener;
// Server 
use pocketmine\player\Player;
use pocketmine\Server;
// Text Format
use pocketmine\utils\TextFormat;
// Main Class
class Main extends PluginBase {
// function onDisable() : void {};
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool { // New Command
        if($cmd->getName() == "test"){ //if sender was a Player
            if($sender instanceof Player) { // Open Form 
            $this->form($sender);
            } else { // Opposite (if sender is a player) []
              $sender->sendMessage ("§a[ExampleFormAPI] You can't open Form on console");
            }
        } //return to previous functions
        return true;
    } //create new SimpleForm
  public function form($player){
    $form = new CustomForm(function(Player $sender, int $data = null){
      if($data === null){
        return true;
      }
      $player->sendMessage("Input said: " .$data[0] )
    }); // UI Form from $form
    $form->setTitle("This is Title");
    $form->addInput("this is input");
    $form->sendToPlayer($player);
    // Back to $form
    return $form;
  }
}

