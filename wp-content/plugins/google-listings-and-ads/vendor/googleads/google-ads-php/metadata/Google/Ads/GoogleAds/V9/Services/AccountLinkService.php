<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/account_link_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Services;

class AccountLinkService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
5google/ads/googleads/v9/enums/mobile_app_vendor.protogoogle.ads.googleads.v9.enums"q
MobileAppVendorEnum"Z
MobileAppVendor
UNSPECIFIED 
UNKNOWN
APPLE_APP_STORE
GOOGLE_APP_STOREB�
!com.google.ads.googleads.v9.enumsBMobileAppVendorProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
7google/ads/googleads/v9/enums/account_link_status.protogoogle.ads.googleads.v9.enums"�
AccountLinkStatusEnum"�
AccountLinkStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVED
	REQUESTED
PENDING_APPROVAL
REJECTED
REVOKEDB�
!com.google.ads.googleads.v9.enumsBAccountLinkStatusProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
7google/ads/googleads/v9/enums/linked_account_type.protogoogle.ads.googleads.v9.enums"�
LinkedAccountTypeEnum"r
LinkedAccountType
UNSPECIFIED 
UNKNOWN
THIRD_PARTY_APP_ANALYTICS
DATA_PARTNER

GOOGLE_ADSB�
!com.google.ads.googleads.v9.enumsBLinkedAccountTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
4google/ads/googleads/v9/resources/account_link.proto!google.ads.googleads.v9.resources7google/ads/googleads/v9/enums/linked_account_type.proto5google/ads/googleads/v9/enums/mobile_app_vendor.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/api/annotations.proto"�
AccountLinkC
resource_name (	B,�A�A&
$googleads.googleapis.com/AccountLink!
account_link_id (B�AH�V
status (2F.google.ads.googleads.v9.enums.AccountLinkStatusEnum.AccountLinkStatusY
type (2F.google.ads.googleads.v9.enums.LinkedAccountTypeEnum.LinkedAccountTypeB�Aq
third_party_app_analytics (2G.google.ads.googleads.v9.resources.ThirdPartyAppAnalyticsLinkIdentifierB�AH Y
data_partner (2<.google.ads.googleads.v9.resources.DataPartnerLinkIdentifierB�AH U

google_ads (2:.google.ads.googleads.v9.resources.GoogleAdsLinkIdentifierB�AH :a�A^
$googleads.googleapis.com/AccountLink6customers/{customer_id}/accountLinks/{account_link_id}B
linked_accountB
_account_link_id"�
$ThirdPartyAppAnalyticsLinkIdentifier+
app_analytics_provider_id (B�AH �
app_id (	B�AH�[

app_vendor (2B.google.ads.googleads.v9.enums.MobileAppVendorEnum.MobileAppVendorB�AB
_app_analytics_provider_idB	
_app_id"R
DataPartnerLinkIdentifier!
data_partner_id (B�AH �B
_data_partner_id"h
GoogleAdsLinkIdentifier@
customer (	B)�A�A#
!googleads.googleapis.com/CustomerH �B
	_customerB�
%com.google.ads.googleads.v9.resourcesBAccountLinkProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3
�
;google/ads/googleads/v9/services/account_link_service.proto google.ads.googleads.v9.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto google/protobuf/field_mask.protogoogle/rpc/status.proto"\\
GetAccountLinkRequestC
resource_name (	B,�A�A&
$googleads.googleapis.com/AccountLink"
CreateAccountLinkRequest
customer_id (	B�AI
account_link (2..google.ads.googleads.v9.resources.AccountLinkB�A"2
CreateAccountLinkResponse
resource_name (	"�
MutateAccountLinkRequest
customer_id (	B�AN
	operation (26.google.ads.googleads.v9.services.AccountLinkOperationB�A
partial_failure (
validate_only ("�
AccountLinkOperation/
update_mask (2.google.protobuf.FieldMask@
update (2..google.ads.googleads.v9.resources.AccountLinkH 
remove (	H B
	operation"�
MutateAccountLinkResponseI
result (29.google.ads.googleads.v9.services.MutateAccountLinkResult1
partial_failure_error (2.google.rpc.Status"0
MutateAccountLinkResult
resource_name (	2�
AccountLinkService�
GetAccountLink7.google.ads.googleads.v9.services.GetAccountLinkRequest..google.ads.googleads.v9.resources.AccountLink"F���0./v9/{resource_name=customers/*/accountLinks/*}�Aresource_name�
CreateAccountLink:.google.ads.googleads.v9.services.CreateAccountLinkRequest;.google.ads.googleads.v9.services.CreateAccountLinkResponse"W���6"1/v9/customers/{customer_id=*}/accountLinks:create:*�Acustomer_id,account_link�
MutateAccountLink:.google.ads.googleads.v9.services.MutateAccountLinkRequest;.google.ads.googleads.v9.services.MutateAccountLinkResponse"T���6"1/v9/customers/{customer_id=*}/accountLinks:mutate:*�Acustomer_id,operationE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v9.servicesBAccountLinkServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v9/services;services�GAA� Google.Ads.GoogleAds.V9.Services� Google\\Ads\\GoogleAds\\V9\\Services�$Google::Ads::GoogleAds::V9::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

