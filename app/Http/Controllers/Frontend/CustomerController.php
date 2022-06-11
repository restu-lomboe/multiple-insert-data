<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\DetailCustomer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('frontend.customer.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {

            \DB::beginTransaction();

            $customer = new Customer;
            $customer->name = $data['name'];
            $customer->email = $data['email'];
            $customer->save();

            if ($request->address) {
                foreach ($data['address'] as $item => $value) {
                    $data2 = array(
                        'customer_id' => $customer->id,
                        'address' => $data['address'][$item],
                        'phone' => $data['phone'][$item],
                        'kode_pos' => $data['kode_pos'][$item],
                    );
                    DetailCustomer::create($data2);
                }
            }

            \DB::commit();

        } catch (\Throwable $th) {

            \DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->back()->with('status', 'Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);

        return view ('frontend.customer.update', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::with('detail')->find($id);

        DetailCustomer::where('customer_id', $id)->delete();

        $data = $request->all();

        try {

            \DB::beginTransaction();

            $customer->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);

            if ($request->address) {
                foreach ($data['address'] as $item => $value) {
                    $data2 = array(
                        'customer_id' => $id,
                        'address' => $data['address'][$item],
                        'phone' => $data['phone'][$item],
                        'kode_pos' => $data['kode_pos'][$item],
                    );
                    DetailCustomer::create($data2);
                }
            }

            \DB::commit();

        } catch (\Throwable $th) {

            \DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->back()->with('status', 'Data Berhasil Di Update');
    }

    public function detail()
    {
        $customers = Customer::all();

        return view ('frontend.customer.detail', compact('customers'));
    }

    public function detailCustomer($id)
    {
        $customers = Customer::where('id', $id)->first();
        // dd($customers);

        return view ('frontend.customer.detail_customer', compact('customers'));
    }
}
