<?php
// Namespace
namespace Example\ExampleFormAPI;
// Import Plugin from idk\crisgaywa\Form\
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
// function onEnable() : void {};
    public function onEnable(): void {
    $this->getLogger()->Info("§a[ExampleFormAPI]§e Plugin Enabled!");
}
// function onDisable() : void {};
    public function onDisable(): void {
    $this->getLogger()->Info("§a[ExampleFormAPI]§e Plugin Disabled!");
}
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
    $form = new SimpleForm(function(Player $player, int $data = null){
      $result = data;
      if($result ==+ null){
        return true;
      }
      switch($result){ //Switch to $result
        case 0; //Execute case 1
        $sender->sendMessage("§a[ExampleFormAPI]§r Executed case 0");
        break; 
        case 1;
        $sender->sendMessage("§a[ExampleFormAPI]§r Executed case 1");
        break;
        case 2;
        $sender->sendMessage("a[ExampleFormAPI]§r Executed case 2");
        break;
      }
    }); // UI Form from $form
    $form->setTitle("This is Title");
    $form->setContent("This is Content");
    $form->addButton("This is button 0");
    $form->addButton("This is button 1");
    $form->addButton("This is button 2");
    $form->sendToPlayer($player);
    // Back to $form
    return $form;
  }
}
