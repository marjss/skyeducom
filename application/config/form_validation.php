<?php
$config = [
			'login' => [

								[
									'field' => 'username',
									'label' => 'Username',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'password',
									'label' => 'Password',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'changepassword' => [

								[
									'field' => 'oldpassword',
									'label' => 'Old Password',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide  %s'
												]

								],
								[
									'field' => 'newpassword',
									'label' => 'New Password',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'retypenewpassword',
									'label' => 'Retype Password',
									'rules' => 'required|trim|matches[newpassword]',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createloginuser' => [

								[
									'field' => 'loginusername',
									'label' => 'Username',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'loginpassword',
									'label' => 'Password',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'loginusertype',
									'label' => 'User Type',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'creatproduct' => [

								[
									'field' => 'productcode',
									'label' => 'Product Code',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'productname',
									'label' => 'Product Name',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'productprice',
									'label' => 'Product Price',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'productcaping',
									'label' => 'Product Caping',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createcustomer' => [

								[
									'field' => 'customername',
									'label' => 'Name',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'customeremail',
									'label' => 'Email',
									'rules' => 'required|trim|valid_email',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createcustomerbycsv' => [

								[
									'field' => 'createcustomercsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createproductbycsv' => [

								[
									'field' => 'createproductcsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createcustomertypebycsv' => [

								[
									'field' => 'createcustomertypecsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createzonetypebycsv' => [

								[
									'field' => 'createzonecsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createapplicationtypebycsv' => [

								[
									'field' => 'createapplicationtypecsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createpersoninchargebycsv' => [

								[
									'field' => 'createpersoninchargecsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createproducttypebycsv' => [

								[
									'field' => 'createproducttypecsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createincotermbycsv' => [

								[
									'field' => 'createincotermcsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createcurrencytypebycsv' => [

								[
									'field' => 'createcurrencycsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createproductioncentersbycsv' => [

								[
									'field' => 'createproductioncentercsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'createinternalofficebycsv' => [

								[
									'field' => 'createinternalofficecsv',
									'label' => 'File Input',
									'rules' => 'callback_checkFile'

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'sokcreation' => [

								[
									'field' => 'soknumber',
									'label' => 'SOK Number',
									'rules' => 'required|trim|is_unique[sok.soknum]',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokdate',
									'label' => 'SOK Date',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokpaymentterms',
									'label' => 'Payment Terms',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokcustomername',
									'label' => 'Customer Name',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokcustomeraddress',
									'label' => 'Address',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokcustomercontactperson',
									'label' => 'Contact Person',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokapplicationtype',
									'label' => 'Application Type',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokcustomertype',
									'label' => 'Customer Type',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokzone',
									'label' => 'Zone',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokproducttype',
									'label' => 'Product Type',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokquotationnumber',
									'label' => 'Quotation Nunmber',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokponumber',
									'label' => 'PO Number',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokpodate',
									'label' => 'PO Date',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokdispatchport',
									'label' => 'Port of Dispatch',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokentryport',
									'label' => 'Port of Entry',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokfreightforwarder',
									'label' => 'Freight Forwarder',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'sokexpdeliverydate',
									'label' => 'Expected Delivery Date',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'monthlypayment' => [

								[
									'field' => 'paidamount',
									'label' => 'Paid Amount',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must need %s'
												]

								],
								[
									'field' => 'payfrom',
									'label' => 'Date Start From',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'payupto',
									'label' => 'Date Up To',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			],
			'agentestatedetail' => [

								[
									'field' => 'estatearea',
									'label' => 'Plot Area',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must need %s'
												]

								],
								[
									'field' => 'estatesize',
									'label' => 'Plot Size',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'estatenumber',
									'label' => 'Plot Number',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'estatetotalamount',
									'label' => 'Total Amount',
									'rules' => 'required|trim',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								],
								[
									'field' => 'formname',
									'label' => 'formname',
									'rules' => 'required',
									'errors' => [
													'required' => 'You must provide a %s'
												]

								]

			]

];