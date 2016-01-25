<?php

namespace FS;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerAchievementAwardedEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerToggleSneakEvent;
use pocketmine\event\player\PlayerToggleSprintEvent;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\level\sound\PopSound;
use pocketmine\level\sound\LaunchSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\BatSound;
use pocketmine\level\particle\FlameParticle;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

	public function onLoad(){
		$this->getLogger()->info("FunStuff §aenabled");
	}

        public function onChat(PlayerChatEvent $event){
        $player = $event->getPlayer();
        $fizz = new PopSound($player);
        $player->getLevel()->addSound($fizz);
     } //plays a popsound on chat event
	
        public function onSprint(PlayerToggleSprintEvent $event){
        $player = $event->getPlayer();
        $fizz = new BatSound($player);
        $particle = new FlameParticle($player);
        $player->getLevel()->addSound($fizz);
        $player->getLevel()->addParticle($particle);
     } //plays a batsound on sprint event

        public function onSneak(PlayerToggleSneakEvent $event){
        $player = $event->getPlayer();
        $fizz = new ClickSound($player);
        $player->getLevel()->addSound($fizz);
    } //plays a click sound in sneak event

        public function onAchievement(PlayerAchievementAwardedEvent $event){
        $player = $event->getPlayer();
        $fizz = new BlazeShootSound($player);
        $player->getLevel()->addSound($fizz);
    } //yay achievement noise

    public function onDisable(){
        $this->getLogger()->info("FunStuff §cdisabled.");
        return true;
	}
}
