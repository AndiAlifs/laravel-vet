<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

use App\Http\Resources\Account as AccountResource;

class AccountController extends Controller
{
    function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function indexAll()
    {
        $accounts = Account::all();
        return AccountResource::collection($accounts);
    }

    public function findOne()
    {
        $id = request()->route('id');
        $account = Account::findOrFail($id);
        return new AccountResource($account);
    }

    public function store(Request $request)
    {
        $account = new Account;
        $account->nama = $request->nama;
        $account->saldo = $request->saldo;
        $account->norek = $request->norek;
        $account->save();
        return new AccountResource($account);
    }

    public function save()
    {
        $account = new Account;
        $account->nama = request()->nama;
        $account->saldo = request()->saldo;
        $account->norek = request()->norek;
        $account->save();

        session()->flash('success', 'Account telah berhasil ditambahkan!');

        return redirect('/');
    }


    public function edit(Account $account)
    {
        //
    }


    public function update(Request $request, Account $account)
    {
        //
    }


    public function destroy(Account $account)
    {
        //
    }
}
