<?php

//Plugin made by Callum Rawlinson
//visit here for more: https://github.com/callumrawlinson or http://callum.versai.network/

namespace FlyUI;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase as Base;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use jojoe77777\FormAPI;

class Main extends Base implements Listener{
  
    public function onEnable(){
        $this->getLogger()->info("FlyUI Activated");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if(strtolower($command->getName()) == "fly"){
          if($sender->hasPermission("fly.permission") || $sender->isOp()){
          }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        $player = $sender->getPlayer();
        switch ($cmd->getName()){
            case "fly":
                $this->mainFrom($player);
                break;
        }
        return true;
    }
    public function mainFrom($player){
        $plugin = $this->getServer()->getPluginManager();
        $formapi = $plugin->getPlugin("FormAPI");
        $form = $formapi->createSimpleForm(function (Player $event, array $args){
            $result = $args[0];
            $player = $event->getPlayer();
            if($result === null){
            }
            switch($result){
                case 0:
                    return;
                case 1:
                    $this->enableForm($player);
                    return;
                case 2:
                    $this->disableForm($player);
                    return;
            }
        });
        $form->setTitle(TF::BOLD . TF::BLACK . "FlyUI Menu");
        $form->setContent(TF::GRAY . "Enable/Disable Fly Mode!");
        $form->addButton(TF::GREEN . "Enable");
        $form->addButton(TF::RED . "Disable");
        $form->addButton(TF::WHITE . "Cancel");
        $form->sendToPlayer($player);
    }
    public function enableForm($player){
        $sender->setAllowFlight(true);
        $sender->setFlying(true);
        $sender->addTitle(TF::GREEN . "Flight Enabled");
      }  
    public function disabeForm($player){
        $sender->setAllowFlight(false);
        $sender->setFlying(false);
        $sender->addTitle(TF::RED . "Flight Disabled!");
      }
    }
