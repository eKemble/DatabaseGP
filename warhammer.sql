DROP SCHEMA IF EXISTS warhammer CASCADE;
CREATE SCHEMA warhammer;

SET search_path = warhammer, public;


DROP TABLE IF EXISTS unit_list;
CREATE TABLE unit_list(
   
   army_id (int)
   unit_name (varchar)
   unit_id (serial)
   unit_profile (varchar)
   unit_composition (varchar)
   init_point_cost (int)
   additional_unit_cost (int)
   add_num_units(int)
   
--------------------------
-- Inside the outlined box
--------------------------
   weapon_skill (int)
   ballistic_skill (int)
   strength (int)
   toughness (int)
   wounds (int)
   initiative (int)
   attacks (int)
   leadership (int)
   save (int)
-------------------------

);

--Army id of 1 = Space Marines

INSERT INTO unit_list( 1, 'Master of the Forge', default, 'HQ', '1 Master of the Forge', 100, null, null, 4, 5, 4, 4, 2, 4, 2, 10, 2);
INSERT INTO unit_list(1, 'Forgefather Vulkan HeStan', default, 'HQ', '1(Unique)', 190, null, null, 6, 5, 4, 4, 3, 5, 3, 10, 2);
INSERT INTO unit_list(1, 'Space Marine Chaplain', default, 'HQ', '1 Chaplain', 100, null, null, 5, 4, 4, 4, 2, 4, 2, 10, 3);
INSERT INTO unit_list(1, 'Tactical Squad', default, 'Troops', '5 Space Marines', 90, 16, 5, 4, 4, 4, 4, 1, 4, 1, 8, 3);
INSERT INTO unit_list(1, 'Scout Squad', default, 'Troops', '5 Scouts', 75, 13, 5, 3, 3, 4, 4, 1, 4, 1, 8, 4);
INSERT INTO unit_list(1, 'Terminator Squad', default, 'Elites', '5 Terminators', 200, 40, 5, 4, 4, 4, 4, 1, 4, 2, 9, 2);
INSERT INTO unit_list(1, 'Techmarine', default, 'Elites', '1 Techmarine', 50, null, null, 4, 4, 4, 4, 1, 4, 1, 8, 2);
INSERT INTO unit_list(1, 'Assault Squad', default, 'Fast Attack', '5 Space Marines', 100, 18, 5, 4, 4, 4, 4, 1, 4, 1, 8, 3);


INSERT INTO unit_list(2, 'Warboss', default, 'HQ', '1 Warboss', 60, null, null, 5, 2, 5, 5, 3, 4, 4, 9, 6);
INSERT INTO unit_list(2, 'Big Mek', default, 'HQ', '1 Big Mek', 35, null, null, 4, 2, 4, 4, 2, 3, 3, 8, 6);
INSERT INTO unit_list(2, 'Weirdboy', default, 'HQ', '1 Weirdboy', 55, null null, 4, 2, 4, 4, 2, 3, 3, 7, 6);
INSERT INTO unit_list(2, 'Ork Boyz', default, 'Troops', '10 Ork Boyz', 60, 6, 20, 4, 2, 3, 4, 1, 2, 2, 7, 6);
INSERT INTO unit_list(2, 'Gretchin', default, 'Troops', '10 Gretchin', 30, 3, 20, 2, 3, 2, 2, 1, 2, 1, 5, null);
INSERT INTO unit_list(2, 'Nobz', default, 'Elites', '3 Nobz', 60, 20, 7, 4, 2, 4, 4, 2, 3, 3, 7, 6);
INSERT INTO unit_list(2, 'Burna Boyz', default, 'Elites', '5 Burna Boyz', 75, 15, 10, 4, 2, 3, 4, 1, 2, 2, 7, 6);
INSERT INTO unit_list(2, 'Tankbustas', default, 'Elites', '5 Tankbusta Boyz', 75, 15, 10, 4, 2, 3, 4, 1, 2, 2, 7, 6);
INSERT INTO unit_list(2, 'Warbikers', default, 'Fast Attack', '3 Warbikes', 75, 25, 9, 4, 2, 3, '4(5)', 1, 2, 2, 7, 4);
INSERT INTO unit_list(2, 'Deffkoptas', default, 'Fast Attack', '1 Deffkopta', 35, 35, 4, 4, 2, 3, '4(5)', 2, 2, 2, 7, 4);

DROP TABLE IF EXISTS vehicle_list;
CREATE TABLE vehicle_list(

   army_id (int)
   vehicle_name (varchar)
   vehicle_id (serial), 
   vehicle_profile (varchar)
   init_point_cost (int)
   
--------------------------
-- Inside the outlined box
--------------------------
   weapon_skill (int)
   ballistic_skill (int)
   strength (int)
   front_armor(int)
   side_armor(int)
   rear_armor(int)
   initiative (int)
   attacks (int)
);

INSERT INTO vehicle_list( 1, 'Rhino', default, 'Dedicated Transport', 35, null, 4, null, 11, 11, 10, null, null);
INSERT INTO vehicle_list( 1, 'Drop Pod', default, 'Dedicated Transport', 35, null, 4, null, 12, 12, 12, null, null);
INSERT INTO vehicle_list( 1, 'Dreadnought', default, 'Elite', 105, 4, 4, 6, 12, 12, 10, 4, 2);
INSERT INTO vehicle_list( 1, 'Land Raider', default, 'Heavy Support', 250, null, 4, null, 14, 14, 14, null, null);
INSERT INTO vehicle_list( 1, 'Predator', default, 'Heavy Support', 60, null, 4, null, 13, 11, 10, null, null);
INSERT INTO vehicle_list( 1, 'Whirlwind', default, 'Heavy Support', 85, null, 4, null, 11, 11, 10, null, null);
INSERT INTO vehicle_list( 1, 'Vindicator', default, 'Heavy Support' 115, null, 4, null, 13, 11, 10, null, null);

INSERT INTO vehicle_list( 2, 'Trukk', default, 'Dedicated Transport', 35, null, 2, null, 10, 10, 10, null, null);
INSERT INTO vehicle_list( 2, 'Battlewagon', default, 'Heavy Support', 90, null, 2, null, 14, 12, 10, null, null);
INSERT INTO vehicle_list( 2, 'Deff Dread', default, 'Heavy Support', 75, 4, 2, 5, 12, 12, 10, 2, 3);
INSERT INTO vehicle_list( 2, 'Killa Kans', default, 'Heavy Support', 35, 2, 3, 5, 11, 11, 10, 2, 2);
INSERT INTO vehicle_list( 2, 'Looted Wagon', default, 'Heavy Support', 35, null, 2, null, 11, 11, 10, null, null);


   -- Separate table for special rules
   
   
   
   -- Separate table for weapon loadout choices
   
DROP TABLE IF EXISTS weapons;
CREATE TABLE weapons(

   army_id(varchar)
   weapon_id(serial)
   weapon_name (varchar)
   range (varchar)
   strength (varchar)
   armor_penetration (varchar)
   wep_type (varchar)
   add_point_cost (int)   --How are you calculating this? added point cost differs for different units, leaving at 0 for now
   )
   
INSERT INTO weapons(1, default, 'Assualt Cannon', 24, 6, 4, 'Heavy4, Rending', 0);
INSERT INTO weapons(1, default, 'Astartes Grenade Launcher (Frag / Krak)', '24 / 24', '3 / 6', '6 / 4', 'Rapid Fire, Blast / Rapid Fire', 0);
INSERT INTO weapons(1, default, 'Autocannon', 48, 7, 4, 'Heavy2', 0);
INSERT INTO weapons(1, default, 'Auxiliary Grenade Launcher (Frag / Krak)', '12 / 12', '3 / 6', '6 / 4', 'Assault1, Blast / Assault1', 0);
INSERT INTO weapons(1, default, 'Boltgun', 24, 4, 5, 'Rapid Fire', 0);
INSERT INTO weapons(1, default, 'Bolt Pistol', 12, 4, 5, 'Pistol', 0);
INSERT INTO weapons(1, default, 'Chain Fist', '-', 'X2', 2, 'Melee, Special Weapon, Unwieldy', 0);
INSERT INTO weapons(1, default, 'Chainsword', '-', 'User', '-', 'Melee', 0);
INSERT INTO weapons(1, default, 'Conversion Beamer', 'Up to 18/ 18-42/ 42-72', '6 / 8 / 10', '- / 4 / 1', 'Heavy1, Blast', 0);
INSERT INTO weapons(1, default, 'Cyclone Missile Launcher (Frag / Krak)', '48 / 48', '4 / 8', '6 / 3', 'Heavy2, Blast / Heavy2', 0);
INSERT INTO weapons(1, default, 'Deathwind Launcher', 12, 5, '-', 'Heavy1, Large Blast', 0);
INSERT INTO weapons(1, default, 'Dragonfire Bolts', 24, 4, 5, 'Rapid Fire, Ignores Cover', 0);
INSERT INTO weapons(1, default, 'Flamer', 'Template', 4, 5, 'Assault1', 0);
INSERT INTO weapons(1, default, 'Flamestorm', 'Template', 6, 3, 'Heavy1', 0);
INSERT INTO weapons(1, default, 'Frag Grenades', 8, 3, null, 'Assualt1, Blast', 0);
INSERT INTO weapons(1, default, 'Heavy Bolter', 36, 5, 4, 'Heavy3', 0);
INSERT INTO weapons(1, default, 'Heavy Flamer', 36, 5, 4, 'Assault1', 0);
INSERT INTO weapons(1, default, 'Hellfire round', 24, 'X', 5, 'Rapid Fire, Poisoned(2+)', 0);
INSERT INTO weapons(1, default, 'Hellfire shell', 36, 'X', '-', 'Heavy1, Blast, Poisoned(2+)', 0);
INSERT INTO weapons(1, default, 'Krak Grenades', 8, 3, null, 'Assualt1, Blast', 0);
INSERT INTO weapons(1, default, 'Kraken Bolt', 30, 4, 4, 'Rapid Fire', 0);
INSERT INTO weapons(1, default, 'Lascannon', 48, 9, 2, 'Heavy1', 0);
INSERT INTO weapons(1, default, 'Meltagun', 12, 8, 1, 'Assault1, Melta', 0);
INSERT INTO weapons(1, default, 'Missile Launcher (Frag / Krak)', '48 / 48', '4 / 8', '6 / 3', 'Heavy1, Blast / Heavy1', 0);
INSERT INTO weapons(1, default, 'Multi-Melta', 24, 8, 1, 'Heavy1, Melta', 0);
INSERT INTO weapons(1, default, 'Plasma Cannon', 36, 7, 2, 'Heavy1, Blast, Gets Hot!', 0);
INSERT INTO weapons(1, default, 'Plasma Gun', 24, 7, 2, 'Rapid Fire, Gets Hot!', 0);
INSERT INTO weapons(1, default, 'Plasma Pistol', 12, 7, 2, 'Pistol, Gets Hot!', 0);
INSERT INTO weapons(1, default, 'Power Fist', '-', 'X2', 2, 'Melee, Specialist Weapon, Unwieldy', 0);
INSERT INTO weapons(1, default, 'Shotgun', 12, 4, '-', 'Assault2', 0);
INSERT INTO weapons(1, default, 'Sniper Rifle', 36, 'X', 6, 'Heavy1, Sniper', 0);
INSERT INTO weapons(1, default, 'Storm Bolter', 24, 4, 5, 'Assault2', 0);
INSERT INTO weapons(1, default, 'Thunderfire Cannon (Surface/ Airfire/ Subterranian)', '60 / 60 / 60', '6 / 5 / 4', '5 / 6 / - ', 'Heavy4, Blast / Heavy4, Blast, Ignore Cover / Heavy4, Blast, Tremor', 0);
INSERT INTO weapons(1, default, 'Typhoon Missile Launcher (Frag / Krak)', '48 / 48', '4 / 8', '6 / 3', 'Heavy2, Blast / Heavy2', 0);
INSERT INTO weapons(1, default, 'Vengence round', 18, 4, 3, 'Rapid Fire, Gets Hot!', 0);

INSERT INTO weapons(2, default, 'Big Shoota', 36, 5, 5, 'Assault3', 0);
INSERT INTO weapons(2, default, 'Boomgun', 36, 8, 3, 'Ordinance1, Large Blast', 0);
INSERT INTO weapons(2, default, 'Burnas', 'Template', 4, 5, 'Assault1', 0);
INSERT INTO weapons(2, default, 'Da Rippa', 24, 7, 2, 'Assault3, Gets Hot!', 0);
INSERT INTO weapons(2, default, 'Dakkagun', 18, 5, 5, 'Assault3', 0);
INSERT INTO weapons(2, default, 'Dakkakannon', 24, 8, 4, 'Assault4', 0);
INSERT INTO weapons(2, default, 'Deffgun', 48, 7, 4, 'Heavy D3', 0);
INSERT INTO weapons(2, default, 'Grot Blasta', 12, 3, '-', 'Assault1', 0);
INSERT INTO weapons(2, default, 'Grotzooka', 18, 6, 5, 'Heavy2, Blast', 0);
INSERT INTO weapons(2, default, 'Kannon (Frag / Shell)', '36 / 36', '4 / 8', '5 / 3', 'Heavy1, Blast / Heavy1', 0);
INSERT INTO weapons(2, default, 'Killkannon', 24, 7, 3, 'Ordinance1, Large Blast', 0);
INSERT INTO weapons(2, default, 'Kustom Mega Blasta', 24, 8, 2, 'Assault1, Gets Hot!', 0);
INSERT INTO weapons(2, default, 'Launcha', 'G48', 5, 5, 'Heavy1, Blast', 0);
INSERT INTO weapons(2, default, 'Power Klaw', '-', 'X2', 2, 'Melee, Specialist Weapon, Unwieldy', 0);
INSERT INTO weapons(2, default, 'Rokkit Launcha', 24, 8, 3, 'Assault1', 0);
INSERT INTO weapons(2, default, 'Skorcha', 'Template', 5, 4, 'Assault1', 0);
INSERT INTO weapons(2, default, 'Shokk Attack Gun', '2D6', 2, 'Ordinance1, Large Blast', 0);
INSERT INTO weapons(2, default, 'Shoota', 18, 4, 6, 'Assault2', 0);
INSERT INTO weapons(2, default, 'Slugga', 12, 4, 6, 'Pistol', 0);
INSERT INTO weapons(2, default, 'Snazzguns', 24, 5, '2D6', 'Assault1', 0);
INSERT INTO weapons(2, default, 'Stikkbomb', 8, 3, null, 'Assualt1, Blast', 0); 
INSERT INTO weapons(2, default, 'Zzap Gun', 36, '2D6', 2, 'Heavy1', 0);

