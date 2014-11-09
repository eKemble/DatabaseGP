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
INSERT INTO unit_list('Space Marines', 1, 'Tactical Squad', default, 'Troops', 'Infantry', '5 Space Marines', 90, 16, 5, 4, 4, 4, 4, 1, 4, 1, 8, 3);
INSERT INTO unit_list('Space Marines', 1, 'Terminator Squad', default, 'Elites', 'Infantry', '5 Terminators', 200, 40, 5, 4, 4, 4, 4, 1, 4, 2, 9, 2);

   -- Separate table for special rules
   
   
   
   -- Separate table for weapon loadout choices
   
DROP TABLE IF EXISTS weapons;
CREATE TABLE weapons(

   army_id(varchar)
   weapon_id(serial)
   weapon_name (varchar)
   range (int)
   strength (int)
   armor_penetration (int)
   wep_type (varchar)
   add_point_cost (int)   --How are you calculating this? added point cost differs for different units, leaving at 0 for now
   )
   
INSERT INTO weapons(1, default, 'Assualt Cannon', 24, 6, 4, 'Heavy4, Rending');
INSERT INTO weapons(1, default, 'Astartes Grenade Launcher (Frag)', 24, 3, 6, 'Rapid Fire, Blast');
INSERT INTO weapons(1, default, 'Astartes Grenade Launcher (Krak)', 24, 6, 4, 'Rapid Fire');
INSERT INTO weapons(1, default, 'Auxiliary Grenade Launcher (Frag)', 12, 3, 6, 'Assault1, Blast');
INSERT INTO weapons(1, default, 'Auxiliary Grenade Launcher (Krak)', 12, 6, 4, 'Assault1');
INSERT INTO weapons(1, default, 'Boltgun', 24, 4, 5, 'Rapid Fire', 0);
INSERT INTO weapons(1, default, 'Bolt Pistol', 12, 4, 5, 'Pistol', 0);
INSERT INTO weapons(1, default, 'Chain Fist', null, 
INSERT INTO weapons(1, default, 'Frag Grenades', 8, 3, null, 'Assualt1, Blast', 0);
INSERT INTO weapons(1, default, 'Krak Grenades', 8, 3, null, 'Assualt1, Blast', 0);

