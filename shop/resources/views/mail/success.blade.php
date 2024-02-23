<table style="border:1px solid rgb(221,221,221);font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="50%" align="center">
<tbody>
<tr>
<td style="padding:0cm" align="left" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>
<td valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>
<td align="left" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
@php $total = 0; @endphp
<tbody>
    <tr><td colspan="4" align="right" width="15">&nbsp;</td></tr>
    <tr>
        <td align="left" height="10"></td>
        <td colspan="3" align="center" height="10">
            <img src="https://nookx.dreamstechnologies.com/template/assets/img/logo.png" height="25" style="padding:10 0;">
        </td>
        <td align="left" height="10"></td>
    </tr>
    <tr>
        <td align="left" height="3"></td>
        <td colspan="3" style="border-top:1px dashed rgb(158,158,158)" align="left" height="3"></td>
        <td align="left" height="3"></td>
    </tr>
    <tr>
        <td align="left" height="5"></td>
        <td colspan="3" style="font-size:11px;line-height:18px;font-family:'',Helvetica;" align="left" height="5">
            <span style="font-weight:bold;color:#EB4648">{{ $customerOrder['name'] }} &nbsp;&nbsp; </span><br>
            Phone : 
            <span style="font-weight:bold;color:rgb(0,0,0)">{{ $customerOrder['phone'] }} &nbsp;&nbsp; </span><br>
            Address : 
            <span style="font-weight:bold;color:rgb(0,0,0)">{{ $customerOrder['address'] }}</span>
        </td>
    </tr>
    
    <tr>
        <td align="left" height="3"></td>
        <td colspan="3" style="border-top:1px dashed rgb(158,158,158)" align="left" height="3"></td>
        <td align="left" height="3"></td>
    </tr>
    <!--  -->
    <tr>
        <td align="left" height="5"></td>
        <td colspan="3" style="font-size:11px;line-height:18px;font-family:'',Helvetica" align="left" height="5">
            Payment Method:
            <span style="font-weight:bold;color:rgb(0,0,0)">Cash on delivery &nbsp;&nbsp; </span><br>
            Payment Status : 
            <span style="font-weight:bold;color:rgb(0,0,0)">Ordered &nbsp;&nbsp; </span><br>
            Courier : 
            <span style="font-weight:bold;color:rgb(0,0,0)">Viettel Post &nbsp;&nbsp; </span>
        </td>
        
    </tr>

    <tr>
        <td align="left" height="3"></td>
        <td colspan="3" style="border-top:1px dashed rgb(158,158,158)" align="left" height="3"></td>
        <td align="left" height="3"></td>
    </tr>
    <!--  -->
    <tr>
        <td align="left" width="15"></td>
        <td style="font-family:'',Helvetica" align="left" width="171">
            <span style="font-size:11px;color:rgb(158,158,158);line-height:21px">Name</span>
        </td>
        <td style="font-family:'',Helvetica" align="left" width="80">
            <span style="font-size:11px;color:rgb(158,158,158);line-height:28px">&nbsp;&nbsp;Quantity</span>
        </td>
        <td style="font-family:'',Helvetica" align="left" width="80">
            <span style="font-size:11px;color:rgb(158,158,158);line-height:28px">&nbsp;&nbsp;Price</span>
        </td>
        <td align="left" width="15"></td>
    </tr>

    <tr>
        <td align="left" height="5"></td>
        <td colspan="3" style="border-top:1px dashed rgb(158,158,158)" align="left" height="5">
        </td>
        <td align="left" height="5"></td>
    </tr>
    <!--  -->
    @foreach ($cartOrder as $order)
    @php
        $priceEnd = $order['price'] * $order['qty'];
        $total += $priceEnd;
    @endphp
    <tr style="color:#000000">
        <td align="left" width="15"></td>
        <td align="left" style="font-family:Helvetica,'Arial',sans-serif;font-weight:normal">
            <span style="font-size:11px;font-weight:bold">{{ $order['name'] }}</span>
            <span style="font-size:11px;line-height:18px">&nbsp;&nbsp;</span>
        </td>
        <td align="left" style="font-family:Helvetica,'Arial',sans-serif;font-weight:normal">
            <span style="font-size:11px;line-height:18px">&nbsp;&nbsp;{{ $order['qty'] }}</span>
        </td>
        <td align="left" style="font-family:Helvetica,'Arial',sans-serif;font-weight:normal">
            <span style="font-size:11px;line-height:18px">&nbsp;&nbsp;${{ $order['price'] }}.00</span>
        </td>
        <td align="right" width="15"></td>
    </tr>
    @endforeach
    <tr><td colspan="4" align="right" width="15">&nbsp;</td></tr>
    <!--  -->
    <tr>
        <td align="left" width="15"></td>
        <td colspan="2" align="left" style="font-family:Helvetica,'Arial',sans-serif;font-weight:normal;color:#000000">
            <span style="font-size:11px;color:#000000;line-height:18px">TOTAL TEMPORARY</span>
        </td>
        <td align="left" style="font-family:Helvetica,'Arial',sans-serif;font-weight:normal;color:#000000">
            <span style="font-size:11px;color:#000000;line-height:18px">&nbsp;&nbsp;${{ $total }}.00</span>
        </td>
        
    </tr>

    <tr>
        <td align="left" width="15"></td>
        <td colspan="2" align="left">
            <span style="font-size:11px;color:rgb(0,0,0);line-height:18px">SHIPPING</span>
        </td>
        <td align="left">
            <span style="font-size:11px;color:rgb(0,0,0);line-height:18px">&nbsp;&nbsp;$0.00</span>
        </td>
    </tr>

    <tr><td colspan="4" align="right" width="15">&nbsp;</td></tr>
    <!--  -->
    <tr>
        <td align="left" height="10"></td>
        <td colspan="3"style="border-top:1px dashed rgb(158,158,158)"align="left" height="10"></td>
        <td align="left" height="10"></td>
    </tr>
    <tr>
        <td colspan="3" align="right">
            <span style="font-size:12px;font-weight:bolder;color:rgb(0,0,0);line-height:28px">
                SUB TOTAL&nbsp;&nbsp;
        </td>
        <td align="left" width="15">
            <span style="font-size:12px;font-weight:bolder;color:rgb(0,0,0);line-height:28px">
                ${{ $total }}.00
            </span>
        </td>
    </tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>