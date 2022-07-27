<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	if ($arResult["isFormNote"] === "Y")
	{
    	echo "Спасибо, ваша заявка принята!";
	} else { ?>
	
	<?=$arResult["FORM_HEADER"]?>
	
	<? if ($arResult["isFormErrors"] === "Y"): ?>
        <div class="errors">
            <?=$arResult["FORM_ERRORS_TEXT"]?> 
        </div>
    <? endif; ?>
<? var_dump($arResult["FORM_ERRORS_TEXT"]); ?>
<? var_dump($_POST); ?>
<div class="contact-form">

    <div class="contact-form__head">
        <div class="contact-form__head-title"><?=$arResult["FORM_TITLE"]?></div>
        <div class="contact-form__head-text"><?=$arResult["FORM_DESCRIPTION"]?></div>
    </div>

    <form class="contact-form__form" action="" method="POST">
        <div class="contact-form__form-inputs">

            <div class="input contact-form__input">
				<label class="input__label" for="medicine_name">
                		<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['NAME']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['NAME']['REQUIRED'] === 'Y' ? ' *' : '')?>
						</div>
                		<input class="input__input" type="text" id="medicine_name" name="medicine_name" value="" required="">
                	<div class="input__notification">
						<?php if(strlen($_POST["medicine_name"] <= 3)) { 
							$arResult["FORM_ERRORS_TEXT"] = 'Поле должно содержать не менее 3-х символов'; 
							} ?>
					</div>
            	</label>
			</div>
            <div class="input contact-form__input">
				<label class="input__label" for="medicine_company">
                		<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['COMPANY_POSITION']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['COMPANY_POSITION']['REQUIRED'] === 'Y' ? ' *' : '')?>
						</div>
                		<input class="input__input" type="text" id="medicine_company" name="medicine_company" value="" required="">
                	<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
            	</label>
			</div>
            <div class="input contact-form__input">
				<label class="input__label" for="medicine_email">
						<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['EMAIL']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['EMAIL']['REQUIRED'] === 'Y' ? ' *' : '')?>
						</div>
						<input class="input__input" type="email" id="medicine_email" name="medicine_email" value="" required="">
					<div class="input__notification">Неверный формат почты</div>
            	</label>
			</div>
            <div class="input contact-form__input">
				<label class="input__label" for="medicine_phone">
						<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['PHONE']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['PHONE']['REQUIRED'] === 'Y' ? ' *' : '')?>
						</div>
						<input class="input__input" type="tel" id="medicine_phone"
							data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" maxlength="12"
							x-autocompletetype="phone-full" name="medicine_phone" value="" required="">
				</label>
			</div>

        </div>
        <div class="contact-form__form-message">
            <div class="input">
				<label class="input__label" for="medicine_message">
                		<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['MESSAGE']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['MESSAGE']['REQUIRED'] === 'Y' ? ' *' : '')?>
						</div>
                		<textarea class="input__input" type="text" id="medicine_message" name="medicine_message"value=""></textarea>
                	<div class="input__notification"></div>
            	</label>
			</div>
        </div>
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
            <button class="form-button contact-form__bottom-button" data-success="Отправлено" data-error="Ошибка отправки">
                <div class="form-button__title">
					<?=$arResult["arForm"]["BUTTON"]?>
				</div>
            </button>
        </div>

    </form>
</div>

<?=$arResult["FORM_FOOTER"]?>
<? } ?>

