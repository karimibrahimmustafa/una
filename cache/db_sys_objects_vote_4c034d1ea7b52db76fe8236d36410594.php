<?php $mixedData=array (
  'sys_cmts' => 
  array (
    'id' => '1',
    'name' => 'sys_cmts',
    'table_main' => 'sys_cmts_votes',
    'table_track' => 'sys_cmts_votes_track',
    'post_timeout' => '604800',
    'min_value' => '1',
    'max_value' => '1',
    'is_undo' => '0',
    'is_on' => '1',
    'trigger_table' => 'sys_cmts_ids',
    'trigger_field_id' => 'id',
    'trigger_field_author' => 'author_id',
    'trigger_field_rate' => 'rate',
    'trigger_field_count' => 'votes',
    'class_name' => '',
    'class_file' => '',
  ),
  'sys_cmts_reactions' => 
  array (
    'id' => '2',
    'name' => 'sys_cmts_reactions',
    'table_main' => 'sys_cmts_reactions',
    'table_track' => 'sys_cmts_reactions_track',
    'post_timeout' => '604800',
    'min_value' => '1',
    'max_value' => '1',
    'is_undo' => '1',
    'is_on' => '1',
    'trigger_table' => 'sys_cmts_ids',
    'trigger_field_id' => 'id',
    'trigger_field_author' => 'author_id',
    'trigger_field_rate' => 'rrate',
    'trigger_field_count' => 'rvotes',
    'class_name' => 'BxTemplVoteReactions',
    'class_file' => '',
  ),
  'bx_persons' => 
  array (
    'id' => '3',
    'name' => 'bx_persons',
    'table_main' => 'bx_persons_votes',
    'table_track' => 'bx_persons_votes_track',
    'post_timeout' => '604800',
    'min_value' => '1',
    'max_value' => '1',
    'is_undo' => '0',
    'is_on' => '1',
    'trigger_table' => 'bx_persons_data',
    'trigger_field_id' => 'id',
    'trigger_field_author' => '',
    'trigger_field_rate' => 'rate',
    'trigger_field_count' => 'votes',
    'class_name' => 'BxPersonsVote',
    'class_file' => 'modules/boonex/persons/classes/BxPersonsVote.php',
  ),
); ?>