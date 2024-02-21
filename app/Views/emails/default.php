<table width="100%" align="center" cellpadding="0" cellspacing="0" style="background: #e6e6e6 url(<?= $base_url ?? '' ?>/public/assets/img/email/email-hero-bg.png) repeat-x center top; font-family: 'Arial'; margin: 0 auto;">
    <tr>
        <td>
            <table width="700" align="center" cellpadding="0" cellspacing="0" style=" box-sizing: border-box; padding: 40px 18px; box-sizing: border-box; margin: 0 auto;">
                <tr>
                    <td>
                        <table width="700" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                            <tr>
                                <td>
                                    <a href="<?= $base_url ?? '' ?>">
                                        <img src="<?= $base_url ?? '' ?>/public/assets/img/logo.png" style="width: 80px;" />
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table bgcolor="#fff" width="700" align="center" cellpadding="0" cellspacing="0" style="
						margin: 40px auto 0 auto; font-family: 'PT Sans', sans-serif; box-sizing: border-box; padding: 34px 26px;">
                            <tr>
                                <td colspan="2">
                                    <p style="font-weight: 300; font-size: 16px; color: #595959; margin: 0; margin: 22px 0;">
                                        <?= $message ?? '' ?>
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table width="700" align="center" cellpadding="0" cellspacing="0" style=" margin: 26px auto 0 auto; font-family: 'PT Sans', sans-serif;">

                            <tr>
                                <td>
                                    <h2 style="font-weight: 300; font-size: 16px; color: #595959; text-align: center; margin: 0; box-sizing: border-box;">
                                        About <a href="<?= $base_url ?? '' ?>/about" style="color: #2164ae;"><?=$web_name?></a>
                                    </h2>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="font-weight: 300; font-size: 14px; color: #595959; text-align: center; margin: 0; margin-top: 18px;">
                                        <a href="<?= $base_url ?? '' ?>/terms" style="color: #2164ae;">Terms and Conditions</a>
                                        <span style="padding: 0 12px;">|</span>
                                        <a href="<?= $base_url ?? '' ?>/privacy" style="color: #2164ae;">Privacy Policy</a>
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="font-weight: 300; font-size: 14px; color: #595959; text-align: center; margin: 0; margin-top: 18px;">
                                        Copyright © <?= date("Y") ?>
                                        <a href="<?= $base_url ?? '' ?>" style="color: #2164ae;"><?=$web_name?></a>.
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>