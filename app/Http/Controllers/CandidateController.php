<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\Category;

class CandidateController extends Controller
{

    public function search(Request $request)
    {
        $jobs = QueryBuilder::for(JobListing::class)
            ->allowedFilters([
                AllowedFilter::callback('search', function ($query, $value) {
                    $query->where(function ($q) use ($value) {
                        if (is_numeric($value)) {
                            $q->where('salary', '>=', $value);
                        }
                        $q->orWhere('title', 'like', "%{$value}%")
                            ->orWhere('description', 'like', "%{$value}%")
                            ->orWhere('location', 'like', "%{$value}%")
                            ->orWhereHas('category', function ($cat) use ($value) {
                                $cat->where('name', 'like', "%{$value}%");
                            });
                    });
                }),
            ])
            ->paginate(10)
            ->appends($request->query());

        return view('jobs.index', compact('jobs'));
    }
}
