<?php

namespace App\Builders\Inscriptions;

use App\Builders\Inscriptions\BuilderInterface;
use App\Repositories\MembersRepository;
use App\Repositories\InscriptionsRepository;
use Illuminate\Http\Request;
use App\Models\Member;

/**
 * Builder director
 */
class Director
{
    /**
     * @param MemberBuilder $memberBuilder
     */
    private $memberBuilder;

    /**
     * @param InscriptionBuilder $inscriptionBuilder
     */
    private $inscriptionBuilder;

    /**
     * Constructor
     */
    function __construct()
    {
        $this->memberBuilder        = new MemberBuilder;
        $this->inscriptionBuilder   = new InscriptionBuilder;
    }

    /**
     * Build an inscription
     * @param Request $request
     */
    public function build(Request $request)
    {
        $answer         = $this->memberBuilder->build($request);
        if ($answer['success']) {
            $request->request->add(['member_id' => $answer['entity']->id]);
            $answer = $this->inscriptionBuilder->build($request);
        }
        return $answer;
    }

    /**
     * Check member / isncription informations
     * @param Request $request
     */
    public function check(Request $request)
    {
        $member         = $this->memberBuilder->check($request);
        $inscription    = null;
        if ( !($member instanceof \Exception) && (!$member->isEmpty()) ) {
            $member     = $member->first();
            $request->request->add(['member_id' => $member->id]);
            $inscription = $this->inscriptionBuilder->check($request);
            if (!$inscription->isEmpty()) {
                $inscription = $inscription->first();
            }
        }
        return [ 'member' => $member, 'inscription' => $inscription ];
    }
}
