<?php

  class SettingsSeeder extends Seeder {

    public function run()
    {
      // DB::table('groups')->delete();

      Setting::create(array(
                                           'option'        => 'header_code',
                                           'value'         => ''
                                           ));

      Setting::create(array(
                                           'option'        => 'footer_code',
                                           'value'         => ''
                                           ));
    }

  }