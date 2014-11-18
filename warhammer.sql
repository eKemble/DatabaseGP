DROP SCHEMA IF EXISTS warhammer CASCADE;
CREATE SCHEMA warhammer;

SET search_path = warhammer, public;


DROP TABLE IF EXISTS unit_list;
CREATE TABLE unit_list(
   
   army (varchar)
   army_id (int)
   unit_name (varchar)
   unit_id (serial)
   unit_profile (varchar)
   unit_type (varchar)
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

)


INSERT INTO unit_list('Space Marines', 1, 'Master of the Forge', default, 'HQ', 'Infantry', '1 Master of the Forge', 100, null, null, 4, 5, 4, 4, 2, 4, 2, 10, 2);
INSERT INTO unit_list('Space Marines', 1, 'Forgefather Vulkan HeStan', default, 'HQ', 'Infantry', '1(Unique)', 190, null, null, 6, 5, 4, 4, 3, 5, 3, 10, 2);
INSERT INTO unit_list('Space Marines', 1, 'Space Marine Chaplain', default, 'HQ', 'Infantry', '1 Chaplain', 100, null, null, 5, 4, 4, 4, 2, 4, 2, 10,	3);
INSERT INTO unit_list('Space Marines', 1, 'Tactical Squad', default, 'Troops', 'Infantry', '5 Space Marines', 90, 16, 5, 4, 4, 4, 4, 1, 4, 1, 8, 3);
INSERT INTO unit_list('Space Marines', 1, 'Scout Squad', default, 'Troops', 'Infantry', '5 Scouts', 75, 13, 3,	3,	4,	4,	1,	4,	1,	8,	4,);
INSERT INTO unit_list('Space Marines', 1, 'Terminator Squad', default, 'Elites', 'Infantry', '5 Terminators', 200, 40, 5, 4, 4, 4, 4, 1, 4, 2, 9, 2);


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
INSERT INTO weapons(1, default, 'Lascannon', 48, 9, 2, 'Heavy1', 0);


