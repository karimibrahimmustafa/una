<?php $mixedData=array (
  'sys_cmts' => 
  array (
    'id' => '1',
    'name' => 'sys_cmts',
    'table_main' => 'sys_cmts_reports',
    'table_track' => 'sys_cmts_reports_track',
    'is_on' => '1',
    'base_url' => '',
    'trigger_table' => 'sys_cmts_ids',
    'trigger_field_id' => 'id',
    'trigger_field_author' => 'author_id',
    'trigger_field_count' => 'reports',
    'class_name' => '',
    'class_file' => '',
  ),
  'bx_persons' => 
  array (
    'id' => '2',
    'name' => 'bx_persons',
    'table_main' => 'bx_persons_reports',
    'table_track' => 'bx_persons_reports_track',
    'is_on' => '1',
    'base_url' => 'page.php?i=view-persons-profile&id={object_id}',
    'trigger_table' => 'bx_persons_data',
    'trigger_field_id' => 'id',
    'trigger_field_author' => 'author',
    'trigger_field_count' => 'reports',
    'class_name' => 'BxPersonsReport',
    'class_file' => 'modules/boonex/persons/classes/BxPersonsReport.php',
  ),
); ?>