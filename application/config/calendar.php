<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['day_type'] = 'long';

$config['show_next_prev'] = TRUE;
$config['next_prev_url'] = site_url('events/calendar');

$config['template'] = '
	{table_open}<table class="calendar table table-bordered">{/table_open}
	{heading_previous_cell}<th><a href="{previous_url}"><i class="icon-arrow-left"></i></a></th>{/heading_previous_cell}
	{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
	{heading_next_cell}<th><a href="{next_url}"><i class="icon-arrow-right"></i></a></th>{/heading_next_cell}
	{week_day_cell}<th class="day_header"><span class="label">{week_day}</span></th>{/week_day_cell}
	{cal_cell_content}<div class="day_listing">{day}</div>{content}{/cal_cell_content}
	{cal_cell_content_today}<div class="today"><div class="day_listing">{day}</div> {content}</div>{/cal_cell_content_today}
	{cal_cell_no_content}<span class="day_listing">{day}</span> <div>
		<ul class="sortable unstyled"></ul>
	</div>{/cal_cell_no_content}
	{cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span><div><ul class="sortable unstyled"></ul></div></div>{/cal_cell_no_content_today}
';

/* End of file calendar.php */
/* Location: ./application/config/calendar.php */

