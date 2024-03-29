<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>View order details</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <!--<link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type = "text/css" rel = "stylesheet"
          href = "//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
          -->
    <style type="text/css">
    body{
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
            color: #000000;
    }
    </style>
</head>
<body>
    @include('includes.header_menu')
    <div style="margin-left: 150px;margin-right: 150px">

        <ul style="align: left;padding: 0px;margin-bottom: 5px">
            <li style="display:inline"><a href = "{{url('/')}}">Home</a></li>
            <label>></label>
            <li style="display:inline"><a href = "{{url('orders/list')}}">Orders</a></li>
            <label>></label>
            <li style="display:inline" class = "active">Details</li>
        </ul>
            <br>
            <label ><b>Order# MONO {{$order->short_order}}</b></label>
            <br>
            <hr style="width: 100%; color: black; background-color:black;margin-top:  0px"  size="1"/>
        <table>
            <tr>
                <td>
                    <label > Date :</label>
                </td>
                <td>
                    <label style="padding-left:54px">{{$order->order_date}}</label>
                </td>
                <td >
                    <label style="color:#ff8001;padding-left:6px">Status:</label>
                </td>
                <td>
                    {!! Form::select('status', $statuses, \App\Status::find($order->order_status)->status_code, ['id' => 'status','style'=>'height: 16px;font-size: 10px;']) !!}              
                </td>
                <td>
                    <label style="padding-left:100px">Order#</label>
                </td>
                <td>
                    <label style="padding-left:20px"> {{$order->short_order}}</label>
                </td>
                <td>
                    <label style="padding-left:50px">Customer #:</label>
                    {!! Form::text('customer_id', $order->customer->id, ['id' => 'customer', 'class' => 'form-control']) !!}

                </td>
                <td>
                <select class = "form-control" id = "order">
                    <option value = "0" selected>Reg</option>
                    <option value = "1">Phone</option>
                    <option value = "100">REPAIR</option>
                    <option value = "101">REDO</option>
                    <option value = "2">W/H</option>
                    <option value = "3">D/S</option>
                    <option value = "4">FB</option>
                    <option value = "5">Mobile</option>
                    <option value = "6">FBA</option>
                </select>
                </td>
            </tr>
             </table> 
             <table >
                 <tr >
                     <td style="font-weight: bold;color: #686869;padding-top:15px">Ship To:</td>
                     <td style="font-weight: bold;color: #686869;padding-left:487px;padding-top:15px">Bill To:</td>
                 </tr>
            </table> 
            <table>
                <tr>
                     <td>Company Name</td>
                     <td>{!! Form::text('company_name', $order->customer->ship_company_name, ['id' => 'company_name']) !!}</td>
                     <td></td>
                        <!---->
                     <td style="padding-left:97px">Company Name</td>
                     <td>{!! Form::text('bill_company_name', $order->customer->bill_company_name, ['id' => 'bill_company_name']) !!}</td>
                     <td></td>
                 </tr>
                 <tr>
                    <td>First/last Name</td>
                    <td>{!! Form::text('first_name', $order->customer->ship_first_name, ['id' => 'first_name']) !!}</td>
                    <td>{!! Form::text('last_name', $order->customer->ship_last_name, ['id' => 'last_name']) !!}</td>
                    <td style="padding-left:97px">First/last Name</td>
                    <td>{!! Form::text('bill_first_name', $order->customer->bill_first_name, ['id' => 'bill_first_name', 'class' => 'form-control']) !!}</td>
                    <td>{!! Form::text('bill_last_name', $order->customer->bill_last_name, ['id' => 'bill_last_name', 'class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <td>Addr1</td>
                    <td>{!! Form::text('shipping_address_1', $order->customer->ship_address_1, ['id' => 'shipping_address_1']) !!}</td>
                    <td></td>
                    <td style="padding-left:97px">Addr1</td>
                    <td>{!! Form::text('bill_address_1', $order->customer->bill_address_1, ['id' => 'bill_address_1', 'class' => 'form-control']) !!}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Addr2</td>
                    <td>{!! Form::text('shipping_address_2', $order->customer->ship_address_2, ['id' => 'shipping_address_2']) !!}</td>
                    <td></td>
                    <td style="padding-left:97px">Addr2</td>
                    <td>{!! Form::text('bill_address_2', $order->customer->bill_address_2, ['id' => 'bill_address_2']) !!}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>City, State, Zip</td>
                    <td>{!! Form::text('ship_city', $order->customer->ship_city, ['id' => 'ship_city']) !!}</td>
                    <td>{!! Form::text('ship_state', $order->customer->ship_state, ['id' => 'ship_state']) !!}</td>
                    <td style="padding-left:97px">City, State, Zip</td>
                    <td>{!! Form::text('bill_city', $order->customer->bill_city, ['id' => 'bill_city']) !!}</td>
                    <td>{!! Form::text('bill_state', $order->customer->bill_state, ['id' => 'bill_state']) !!}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>{!! Form::text('ship_zip', $order->customer->ship_zip, ['id' => 'ship_zip','style'=>'width: 100px']) !!}</td>
                    <td></td>
                    <td style="padding-left:97px"></td>
                    <td>{!! Form::text('bill_zip', $order->customer->bill_zip, ['id' => 'bill_zip','style'=>'width: 100px']) !!}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{!! Form::text('ship_country', $order->customer->ship_country, ['id' => 'ship_country']) !!}</td>
                    <td></td>
                    <td style="padding-left:97px">Country</td>
                    <td>{!! Form::text('bill_country', $order->customer->bill_country, ['id' => 'bill_country']) !!}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{!! Form::text('ship_phone', $order->customer->ship_phone, ['id' => 'company_name']) !!}</td>
                    <td></td>
                    <td style="padding-left:97px">Phone</td>
                    <td>{!! Form::text('bill_phone', $order->customer->bill_phone, ['id' => 'bill_phone']) !!}</td>
                    <td></td>
                </tr> 
            </table>
<!--{!! Form::text('ship_email', $order->customer->ship_email, ['id' => 'ship_email']) !!}

-->
            <table>
                <tr>
                    <td><hr style="width: 470px; color: black; background-color:black;margin-top: 10px"  size="1"/></td>
                    <td><hr style="margin-left:58px;width: 470px; color: black; background-color:black;margin-top:  10px"  size="1"/></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td>Amount</td>
                    <td style="padding-left:40px">${!!$order->total!!}</td>
                    <td style="padding-left:10px"><b>Auto tax calculation:<b></td>
                    <td>{!! Form::select('paid', ['Yes', 'No'], $order->paid, ['id' => 'paid']) !!}</td>
                    <td style="padding-left:190px">E-Mail:</td>
                    <td style="padding-left:20px">{!! Form::text('bill_email', $order->customer->bill_email, ['id' => 'bill_email','style'=>'width: 300px']) !!}</td>
                   <!-- {!! Form::text('email', $order->customer->ship_email, ['id' => 'email', 'class' => 'form-control']) !!}
                    -->
                    <td></td>
                </tr>
                <tr>
                    <td>Paid:</td>
                    <td style="padding-left:40px"> {!! Form::select('tax_calculation', ['Yes', 'No'], $order->paid, ['id' => 'tax_calculation']) !!}</td>
                    <td ><a style="color:#ff8001" href="#">View/Report Actual Payment</a></td>
                    <td>Paid: $123</td>
                    <td style="padding-left:190px">Payment:</td>
                    <td style="padding-left:20px"> {{$order->payment_method}}</td>
                    <td></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td>Ship Via:</td>
                    <td style="padding-left:32px"><b>{!! Form::select('shipping_method', $shipping_methods, $order->customer->shipping, ['id' => 'shipping_method','style' => 'color: #FF0000;font-weight: bold; height: 16px;font-size: 10px;']) !!}</b>
                    <br>
                    <span>Weight 0.1000 Lbs.</span>
                    </td>
                    <td style="padding-left:289px">
                        <label><b>Customer comment</b></label><br>
                        {!! Form::textarea('order_comments', $order->order_comments, ['id' => 'order_comments','rows' => '2', 'style'=>'width: 155px']) !!}
                        <br>
                        <label><b>Gift message:</b></label>
                        <br>
                        <textarea class = "form-control" id = "Gift message"></textarea>
                        <br>
                        <a style="color:red" href="#">View/update custom data</a>
                    </td>
                </tr>
            </table>                      
            <table>
                <tr>
                    <td style="padding-left:30px">Name</td>
                    <td style="padding-left:180px">Code</td>
                    <td style="padding-left:90px">Quantity</td>
                    <td style="padding-left:60px">Inv</td>
                    <td style="padding-left:60px">Each</td>
                    <td style="padding-left:20px">Options</td>
                    <td style="padding-left:130px">D/Shipper<br><a href = "#">(Transmit)</a></td>
                    <td style="padding-left:160px">B/O</td>
                </tr>
            </table>
            <hr style="width: 100%; color: black; background-color:black;margin-top:  10px"  size="1"/>
            <table> 
                @foreach($order->items as $item)
                    <tr>
                        <td style='width: 200px;padding-left:30px'><a href = "#">{{$item->item_description}}</a></td>
                        <td ><a style='color:red' href = "#">{{$item->item_code}}</a></td>
                        <td style="padding-left:80px">{!! Form::text('item_quantity', $item->item_quantity, ['id' => 'item_quantity','style'=>'width:35px']) !!}</td>
                        <td style="width:130px"></td>
                        <td>${{$item->item_unit_price}}</td>
                        <td style="padding-left:20px">{!! Form::textarea('item_option', \Monogram\Helper::jsonTransformer($item->item_option), ['id' => 'item_option', 'rows' => '3','style'=>'width:150px;color:#686869;font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 9px']) !!}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
            <hr style="width: 100%; color: black; background-color:black;margin-top:  10px"  size="1"/>
            <table>
                <tr>
                    <td ><p style="border-style: solid;color:#686869;border-width: 1px;padding:4px 540px 4px 10px "><b>Customer Interactions</b> <a style='color:#ff8001' href="#">(add a note/reminder)</a></p></td> 
                </tr>
            </table>  
            <table style="margin-left:775px">    
                        <tr>
                            <td align="right" style="padding-right:40px ">Subtotal:</td>
                            <td align="right">${{sprintf("%02.2f",$order->sub_total)}}</td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:40px ">Coupon <b>(ggibi7t4kun2f)</b>:</td>
                            <td align="right">${!!sprintf("%02.2f",$order->coupon_value)!!}</td>
                        </tr>
                       <tr>
                            <td align="right" style="padding-right:40px ">Gift Wrap:</td>
                            <td align="right" >{!! Form::text('gift_wrap_cost', sprintf("%02.2f",$order->gift_wrap_cost), ['id' => 'gift_wrap_cost','style'=>'width:60px']) !!}</td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:40px ">Shipping:</td>
                            <td align="right" >${{sprintf("%02.2f",$order->shipping_charge)}}</td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:40px ">Insurance:</td>
                            <td align="right" >$ {!! Form::text('insurance', sprintf("0.00"), ['id' => 'insurance','style'=>'width:60px']) !!}</td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:45px ">Adjustments:</td>
                            <td align="right" >$ {!! Form::text('adjustments', sprintf("%02.2f",$order->adjustments), ['id' => 'adjustments','style'=>'width:60px']) !!}</td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:45px ">Tax:</td>
                            <td align="right" >${{sprintf("%02.2f",$order->tax_charge)}}</td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:45px ">Total:</td>
                            <td align="right" >${{sprintf("%02.2f",$order->total)}}</td>
                        </tr>
                        <tr>
                             
                        </tr>
            </table> 
                        <div align="right">
                             <button type = "submit" class = "btn btn-primary">Update Order</button>
                        </div>              
    </div>

</body>
</html>