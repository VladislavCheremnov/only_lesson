<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y") { ?>


<div class="contact-form">
	<div class="contact-form__head">
		<?if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y"){?>	
				<div class="contact-form__head-title"><?=$arResult["FORM_TITLE"]?></div>
				<div class="contact-form__head-text"><?=$arResult["FORM_DESCRIPTION"]?></div>
		<?} // endif?>
	</div>
	<?//=$arResult["FORM_HEADER"]?>
	<?=str_replace('<form', '<form class="contact-form__form"', $arResult["FORM_HEADER"]); ?>
		
			<div class="contact-form__form-inputs">
	
				<?
				foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
				{
					if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
					{
						echo $arQuestion["HTML_CODE"];
					}
					else
					{
				?>
	
				<div class="input contact-form__input">
					<label class="input__label" for="medicine_name">
						<div class="input__label-text"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
							<?=$arQuestion["HTML_CODE"]?>
					</label>
				</div>

				<?php continue; ?>

					<tr>
						<td>
							<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
							<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
							<?endif;?>
							<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
							<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
						</td>
						<td><?=$arQuestion["HTML_CODE"]?></td>
					</tr>
				<?
					}
				} //endwhile
				?>

			</div>
			
			<!-- <div class="input contact-form__input">
					<label class="input__label" for="medicine_name">
						<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['NAME']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['NAME']['REQUIRED'] === 'Y' ? '*' : '')?>
						</div>
						<input class="input__input" type="text" id="medicine_name" name="medicine_name" value=""required="">
						<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
					</label>
				</div>
				<div class="input contact-form__input">
					<label class="input__label" for="medicine_company">
						<div class="input__label-text">
								<?=$arResult["QUESTIONS"]['COMPANY_POSITION']['CAPTION']?>
								<?=($arResult["QUESTIONS"]['COMPANY_POSITION']['REQUIRED'] === 'Y' ? '*' : '')?>
						</div>
						<input class="input__input" type="text" id="medicine_company" name="medicine_company" value=""required="">
						<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
					</label>
				</div>
				<div class="input contact-form__input">
					<label class="input__label" for="medicine_email">
						<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['EMAIL']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['EMAIL']['REQUIRED'] === 'Y' ? '*' : '')?>
						</div>
						<input class="input__input" type="email" id="medicine_email" name="medicine_email" value=""required="">
						<div class="input__notification">Неверный формат почты</div>
					</label>
				</div>
				<div class="input contact-form__input">
					<label class="input__label" for="medicine_phone">
						<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['PHONE']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['PHONE']['REQUIRED'] === 'Y' ? '*' : '')?>
						</div>
						<input class="input__input" type="tel" id="medicine_phone"
						data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" maxlength="12"
						x-autocompletetype="phone-full" name="medicine_phone" value="" required="">
					</label>
				</div>-->
				<!-- <div class="contact-form__form-message">
					<div class="input">
						<label class="input__label" for="medicine_message">
						<div class="input__label-text">
							<?=$arResult["QUESTIONS"]['MESSAGE']['CAPTION']?>
							<?=($arResult["QUESTIONS"]['MESSAGE']['REQUIRED'] === 'Y' ? '*' : '')?>
						</div>
						<textarea class="input__input" type="text" id="medicine_message" name="medicine_message"value=""></textarea>
						<div class="input__notification"></div>
						</label>
					</div>
				</div> -->
			

			<div class="contact-form__bottom">
				<div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
					ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
					данных&raquo;.
				</div>
				<input class="form-button contact-form__bottom-button" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?>
				type="submit" name="web_form_submit" value="<?=$arResult["arForm"]["BUTTON"]?>">
				
			</div>
			
</div>
<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<? } ?><!--//endif (isFormNote) -->
