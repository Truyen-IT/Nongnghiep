<TABLE id='table'>
<TR>
    <TH>ID.No</TH>
    <TH>Name</TH>
    <TH>CardID</TH>
    <TH>SerialNumber</TH>
    <TH>Date</TH>
    <TH>Time In</TH>
    <TH>Time Out</TH>
    <TH>User Status</TH>
</TR>

<tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach($all_diemdanh as $key=> $cat)
                    @php
                    $i++;
                    @endphp
                    <tr>
                        <td><label class="i-checks m-b-none">{{$i}}</label></td>
                       
                        <td>{{$cat->admin_maso}}</td>
                        <td>{{$cat->nhanvien_hoten}}</td>
                        <td>{{number_format($cat->captien).''.'VND'}}</td>
                        <td><span class="text-ellipsis">{{$cat->admin_time}}</span></td>
                        <td><span class="text-ellipsis">{{$cat->admin_day}}</span></td>

                    </tr>




                    @endforeach

                </tbody>
          


</TABLE>