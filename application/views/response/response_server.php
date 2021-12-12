<?php
$arr= array(
	"draw"            => isset ( $request['draw'] ) ?
		intval( $request['draw'] ) :
		0,
	"recordsTotal"    => intval( $recordsTotal ),
	"recordsFiltered" => intval( $recordsFiltered ),
	"data"            => self::data_output( $columns, $data)
);

return $arr;
