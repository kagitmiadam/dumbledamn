<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\CharacterBook;
use App\Models\CharacterInventory;
use App\Models\Items;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
        // Item (Ekipman) Kuşanma
        public function wearItem(Request $request) {
            $update = Character::find($request->character_id);
            $update1 = CharacterInventory::find($request->id);
            $update2 = CharacterInventory::find($request->current_equipped_inventory_id);
            $item_type = $request->item_type;
            if ($item_type == "Asa") {
                $update->wand_id = $request->item_id;
                $update->attack_power = $request->attack_power;
                $update->defence_power = $request->defence_power;
            } elseif($item_type == "Evcil Hayvan") {
                // Karakter
                $update->pet_id = $request->item_id;
                $update->attack_power = $request->attack_power;
                $update->defence_power = $request->defence_power;
            } elseif($item_type == "Pelerin") {
                $update->gown_id = $request->item_id;
                $update->attack_power = $request->attack_power;
                $update->defence_power = $request->defence_power;
            } elseif($item_type == "Süpürge") {
                $update->broom_id = $request->item_id;
                $update->speed_power = $request->speed_power;
            }
            $update->save();
            // Giyilen Ekipman Bilgileri
            if (!$update1 == null) {
                $update1->count = $request->count - 1;
                $update1->wear_status = 1;
                $update1->save();
            }
            // Çıkartılan Ekipman Bilgileri
            if (!$update2 == null) {
                $update2->count = $request->current_equipped_item_count + 1;
                $update2->wear_status = 0;
                $update2->save();
            }
    
            return redirect()->route('get-item')->with('success', 'Kuşanma başarılı!');
        }
        // Item (Ekipman) Satın Alma | Güncelleme (Evcil Hayvan, Asa, Pelerin, Süpürge)
        public function updateItem(Request $request) {
            $update1 = Character::find($request->character_id);
            $update = CharacterInventory::find($request->id);
    
            $location = $request->location_id;
            if ($request->galleon * $request->count > Auth::user()->character->galleon) {
                return redirect()->route('get-item', ['id' => $location])->with('danger', 'Para yetersiz!');
            } else {
                $update->id = $request->id;
                $update->count = $update->count + $request->count;
                $update->save();
                $update1->galleon = $request->galleon;
                $update1->save();
                return redirect()->route('get-item', ['id' => $location])->with('success', 'Satın alma başarılı!');
            }
        }
        // Item (Ekipman) Satın Alma | Ekleme
        public function submitItem(Request $request) {
            $submit = new CharacterInventory;
            $update = Character::find($request->character_id);
    
            $location = $request->location_id;
            if ($request->galleon * $request->count > Auth::user()->character->galleon) {
                return redirect()->route('get-item', ['id' => $location])->with('danger', 'Para yetersiz!');
            } else {
                $submit->item_id = $request->item_id;
                $submit->character_id = $request->character_id;
                $submit->count = $request->count;
                $submit->save();
                $update->galleon = $request->galleon;
                $update->save();
                return redirect()->route('get-item', ['id' => $location])->with('success', 'Satın alma başarılı!');
            }
        }
        // Item (Ekipman) Satma | Delete
        public function deleteItem(Request $request) {
            $delete = CharacterInventory::find($request->id);
            $update = CharacterInventory::find($request->id);
            $update2 = Character::find($request->character_id);
    
            if ($request->count > 1) {
                $update->count = $request->count - 1;
                $update2->galleon = $update2->galleon + $request->galleon;
                $update->save();
                $update2->save();
            } else {
                $update2->galleon = $update2->galleon + $request->galleon;
                $update2->save();
                $delete->delete();
            }
    
            return redirect()->route('get-item')->with('success', 'Satma başarılı!');
        }
        // Kitap | Satın Alma | Submit
        public function submitBook(Request $request) {
            $submit = new CharacterBook;
            $submit->book_id = $request->book_id;
            $submit->character_id = $request->character_id;
            $submit->status = $request->status;
            $submit->save();
    
            $update = Character::find($request->character_id);
            $update->galleon = $request->galleon;
            $update->save();
    
            $location = $request->location_id;
            return redirect()->route('get-item', ['id' => $location])->with('success', 'Satın alma başarılı!');
        }
        // Kitap | Satma | Delete
        public function deleteBook(Request $request) {
            $delete = CharacterBook::find($request->id);
            $delete->delete();
    
            $update = Character::find($request->character_id);
            $update->galleon = $request->galleon;
            $update->save();
    
            $location = $request->location_id;
            return redirect()->route('get-item', ['id' => $location])->with('success', 'Satın alma başarılı!');
        }
}
