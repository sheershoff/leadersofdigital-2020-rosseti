<?php


namespace common\detector;


class Neural
{
    public static function detect(array $inarray): array
    {
        // Pretrained NN for existing data here from https://github.com/Subaltern276/rosseti/blob/main/elnet.c

        $netsum = 0;
        $feature2 = [];

        /* $inarray[1] - это вход - значние гармоники 50 √ц, м¬ */
        /* $inarray[2] - это вход - значние гармоники 100 √ц, м¬*/
        /* $inarray[3] - это вход - значние гармоники 200 √ц, м¬ */
        /* $inarray[4] - это вход - значние гармоники 400 √ц, м¬*/
        /* $inarray[5] - это вход - значние гармоники 800 √ц, м¬ */
        /* $inarray[6] - это вход - значние гармоники 50 √ц, м¬ */
        /* $outarray[1] - это выход - маркер устройства Ъ1*/
        /* $outarray[2] - это выход - маркер устройства Ъ2*/
        /* $outarray[3] - это выход - маркер устройства Ъ3 */
        /* $outarray[4] - это выход - маркер устройства Ъ4 */
        /* $outarray[5] - это выход - маркер устройства Ъ5 */

        if ($inarray[0] < 0) $inarray[0] = 0;
        if ($inarray[0] > 11500) $inarray[0] = 11500;
        $inarray[0] = 2 * $inarray[0] / 11500 - 1;

        if ($inarray[1] < 0) $inarray[1] = 0;
        if ($inarray[1] > 8500) $inarray[1] = 8500;
        $inarray[1] = 2 * $inarray[1] / 8500 - 1;

        if ($inarray[2] < 0) $inarray[2] = 0;
        if ($inarray[2] > 21500) $inarray[2] = 21500;
        $inarray[2] = 2 * $inarray[2] / 21500 - 1;

        if ($inarray[3] < 0) $inarray[3] = 0;
        if ($inarray[3] > 850) $inarray[3] = 850;
        $inarray[3] = 2 * $inarray[3] / 850 - 1;

        if ($inarray[4] < 0) $inarray[4] = 0;
        if ($inarray[4] > 75) $inarray[4] = 75;
        $inarray[4] = 2 * $inarray[4] / 75 - 1;

        if ($inarray[5] < 0) $inarray[5] = 0;
        if ($inarray[5] > 9.5) $inarray[5] = 9.5;
        $inarray[5] = 2 * $inarray[5] / 9.5 - 1;

        $netsum = 1.734605E-03;
        $netsum += $inarray[0] * 1.665143;
        $netsum += $inarray[1] * 8.000408E-02;
        $netsum += $inarray[2] * 2.70011;
        $netsum += $inarray[3] * 0.3322288;
        $netsum += $inarray[4] * -0.6587198;
        $netsum += $inarray[5] * -3.858934;
        $feature2[0] = 1 / (1 + exp(-$netsum));

        $netsum = -1.903254E-03;
        $netsum += $inarray[0] * -3.22388;
        $netsum += $inarray[1] * 1.166538;
        $netsum += $inarray[2] * -5.202081;
        $netsum += $inarray[3] * 1.249095;
        $netsum += $inarray[4] * 3.011827;
        $netsum += $inarray[5] * 2.39662;
        $feature2[1] = 1 / (1 + exp(-$netsum));

        $netsum = 1.022302E-03;
        $netsum += $inarray[0] * 0.5865547;
        $netsum += $inarray[1] * -1.175261;
        $netsum += $inarray[2] * 0.2210706;
        $netsum += $inarray[3] * -0.9034917;
        $netsum += $inarray[4] * -2.870687;
        $netsum += $inarray[5] * 3.062758;
        $feature2[2] = 1 / (1 + exp(-$netsum));

        $netsum = -1.633564E-03;
        $netsum += $inarray[0] * 2.352023;
        $netsum += $inarray[1] * -1.521734;
        $netsum += $inarray[2] * -0.5505161;
        $netsum += $inarray[3] * -1.607265;
        $netsum += $inarray[4] * 0.1940706;
        $netsum += $inarray[5] * 2.014109;
        $feature2[3] = 1 / (1 + exp(-$netsum));

        $netsum = 1.324692E-04;
        $netsum += $inarray[0] * -4.120041;
        $netsum += $inarray[1] * -0.1554524;
        $netsum += $inarray[2] * 7.264225;
        $netsum += $inarray[3] * 4.289451E-02;
        $netsum += $inarray[4] * -1.623016;
        $netsum += $inarray[5] * -0.5855619;
        $feature2[4] = 1 / (1 + exp(-$netsum));

        $netsum = 2.326104E-04;
        $netsum += $inarray[0] * -7.079397;
        $netsum += $inarray[1] * -1.161765;
        $netsum += $inarray[2] * 4.646953;
        $netsum += $inarray[3] * -1.378709;
        $netsum += $inarray[4] * -2.153645;
        $netsum += $inarray[5] * 5.722049;
        $feature2[5] = 1 / (1 + exp(-$netsum));

        $netsum = 5.906532E-03;
        $netsum += $inarray[0] * 3.960942;
        $netsum += $inarray[1] * -0.6406283;
        $netsum += $inarray[2] * -1.069783;
        $netsum += $inarray[3] * -0.5339674;
        $netsum += $inarray[4] * -2.192016;
        $netsum += $inarray[5] * -0.190075;
        $feature2[6] = 1 / (1 + exp(-$netsum));

        $netsum = -3.792822E-04;
        $netsum += $inarray[0] * -1.469504;
        $netsum += $inarray[1] * 1.973383;
        $netsum += $inarray[2] * -5.624649;
        $netsum += $inarray[3] * 2.116266;
        $netsum += $inarray[4] * 9.124871;
        $netsum += $inarray[5] * -5.550283;
        $feature2[7] = 1 / (1 + exp(-$netsum));

        $netsum = -3.875314E-03;
        $netsum += $inarray[0] * -1.090645;
        $netsum += $inarray[1] * 0.8581835;
        $netsum += $inarray[2] * -2.896727;
        $netsum += $inarray[3] * 1.356613;
        $netsum += $inarray[4] * 1.75018;
        $netsum += $inarray[5] * 0.8354786;
        $feature2[8] = 1 / (1 + exp(-$netsum));

        $netsum = 3.998312E-04;
        $netsum += $inarray[0] * -0.8600558;
        $netsum += $inarray[1] * 7.240223;
        $netsum += $inarray[2] * -5.071658;
        $netsum += $inarray[3] * 7.442216;
        $netsum += $inarray[4] * -7.434173;
        $netsum += $inarray[5] * 3.501855;
        $feature2[9] = 1 / (1 + exp(-$netsum));

        $netsum = -2.573156E-03;
        $netsum += $inarray[0] * 5.99459;
        $netsum += $inarray[1] * -1.962424;
        $netsum += $inarray[2] * -0.3647805;
        $netsum += $inarray[3] * -1.865372;
        $netsum += $inarray[4] * -0.9598088;
        $netsum += $inarray[5] * 0.254456;
        $feature2[10] = 1 / (1 + exp(-$netsum));

        $netsum = 2.458184;
        $netsum += $feature2[0] * 4.160834;
        $netsum += $feature2[1] * -3.042623;
        $netsum += $feature2[2] * -1.555428;
        $netsum += $feature2[3] * -0.430846;
        $netsum += $feature2[4] * -4.235119;
        $netsum += $feature2[5] * -10.09967;
        $netsum += $feature2[6] * 4.31566;
        $netsum += $feature2[7] * 6.35954;
        $netsum += $feature2[8] * 0.6308635;
        $netsum += $feature2[9] * -4.506049;
        $netsum += $feature2[10] * 3.47621;
        $outarray[0] = 1 / (1 + exp(-$netsum));

        $netsum = -1.186916;
        $netsum += $feature2[0] * 3.695977;
        $netsum += $feature2[1] * -7.260398;
        $netsum += $feature2[2] * -6.456038E-02;
        $netsum += $feature2[3] * -0.2321386;
        $netsum += $feature2[4] * 6.79741;
        $netsum += $feature2[5] * 4.709374;
        $netsum += $feature2[6] * -0.9492169;
        $netsum += $feature2[7] * -6.923043;
        $netsum += $feature2[8] * -3.221125;
        $netsum += $feature2[9] * 4.21039;
        $netsum += $feature2[10] * 1.59766;
        $outarray[1] = 1 / (1 + exp(-$netsum));

        $netsum = -0.1868447;
        $netsum += $feature2[0] * -4.910997E-02;
        $netsum += $feature2[1] * 1.814922;
        $netsum += $feature2[2] * -5.662271;
        $netsum += $feature2[3] * -0.1922616;
        $netsum += $feature2[4] * 1.952459;
        $netsum += $feature2[5] * -0.3744743;
        $netsum += $feature2[6] * -5.036635;
        $netsum += $feature2[7] * 9.919573;
        $netsum += $feature2[8] * 3.549625;
        $netsum += $feature2[9] * -3.658515;
        $netsum += $feature2[10] * -1.864954;
        $outarray[2] = 1 / (1 + exp(-$netsum));

        $netsum = -0.7026701;
        $netsum += $feature2[0] * -3.039284;
        $netsum += $feature2[1] * -1.149289;
        $netsum += $feature2[2] * 0.6313487;
        $netsum += $feature2[3] * -1.111368;
        $netsum += $feature2[4] * 0.9778869;
        $netsum += $feature2[5] * 0.8080075;
        $netsum += $feature2[6] * -0.578046;
        $netsum += $feature2[7] * -1.034003;
        $netsum += $feature2[8] * 1.370292;
        $netsum += $feature2[9] * 5.355508;
        $netsum += $feature2[10] * -0.8226923;
        $outarray[3] = 1 / (1 + exp(-$netsum));

        $netsum = -0.7548243;
        $netsum += $feature2[0] * -2.29426;
        $netsum += $feature2[1] * -0.6577095;
        $netsum += $feature2[2] * -0.9501557;
        $netsum += $feature2[3] * 4.521562;
        $netsum += $feature2[4] * -2.084191;
        $netsum += $feature2[5] * -1.694827;
        $netsum += $feature2[6] * 0.3837976;
        $netsum += $feature2[7] * -1.747909;
        $netsum += $feature2[8] * 1.164908;
        $netsum += $feature2[9] * -0.7674227;
        $netsum += $feature2[10] * 5.64809;
        $outarray[4] = 1 / (1 + exp(-$netsum));


        $outarray[0] = ($outarray[0] - .1) / .8;
        if ($outarray[0] < 0) $outarray[0] = 0;
        if ($outarray[0] > 1) $outarray[0] = 1;

        $outarray[1] = ($outarray[1] - .1) / .8;
        if ($outarray[1] < 0) $outarray[1] = 0;
        if ($outarray[1] > 1) $outarray[1] = 1;

        $outarray[2] = ($outarray[2] - .1) / .8;
        if ($outarray[2] < 0) $outarray[2] = 0;
        if ($outarray[2] > 1) $outarray[2] = 1;

        $outarray[3] = ($outarray[3] - .1) / .8;
        if ($outarray[3] < 0) $outarray[3] = 0;
        if ($outarray[3] > 1) $outarray[3] = 1;

        $outarray[4] = ($outarray[4] - .1) / .8;
        if ($outarray[4] < 0) $outarray[4] = 0;
        if ($outarray[4] > 1) $outarray[4] = 1;

        return $outarray;

    }
}