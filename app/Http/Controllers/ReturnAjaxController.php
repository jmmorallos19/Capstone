<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Member;


class ReturnAjaxController extends Controller
{
    public function getDataReturn(Request $request){

        try {
            $accession = null;

            // Get the row where the accession_no is equal to user accession in the Book table
            $bookAccession = Book::where('accession_no', $request->accession)->first();
            $bookCopyAccession = BookCopy::where('accession_no', $request->accession)->first();

            // Get the row where the library_card_no is equal to user library card
            $libraryCard = Member::where('library_card_no', $request->libraryCard)->first();  // Use first() to get a single row

            // Check if the accession is found in the Book table
            if ($bookAccession) {
                $accession = $bookAccession;

                $data = [
                    'response_code' => '200',
                    'status' => 'success',
                    'message' => 'get_success',
                    'accession' => $accession,
                    'libraryCard' => $libraryCard,
                ];
            }
            // Check if the accession is found in the BookCopy table
            elseif ($bookCopyAccession) {
                $accession = $bookCopyAccession;

                $data = [
                    'response_code' => '200',
                    'status' => 'success',
                    'message' => 'get_success',
                    'accession' => $accession,
                    'libraryCard' => $libraryCard,
                ];
            } else {
                // If neither found
                $data = [
                    'response_code' => '404',
                    'status' => 'error',
                    'message' => 'accession_not_found',
                ];
            }
        } catch (\Throwable $th) {
            // Log error if needed
            // Log::error($th->getMessage());
            $data = [
                'response_code' => '500',
                'status' => 'error',
                'message' => 'internal_error',
            ];
        }

        return response()->json($data);

    }


}
