<?php

/*
 * This file is part of the Jiannei/lumen-api-starter.
 *
 * (c) Jiannei <longjian.huang@foxmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Enums;

use Jiannei\Enum\Laravel\Repositories\Enums\HttpStatusCodeEnum;

class ResponseCodeEnum extends HttpStatusCodeEnum
{
    // 业务操作正确码：1xx、2xx、3xx 开头，后拼接 3 位
    // 200 + 001 => 200001，也就是有 001 ~ 999 个编号可以用来表示业务成功的情况，当然你可以根据实际需求继续增加位数，但必须要求是 200 开头
    // 举个栗子：你可以定义 001 ~ 099 表示系统状态；100 ~ 199 表示授权业务；200 ~ 299 表示用户业务...
    public const SERVICE_CREATE_SUCCESS = 200001;
    public const SERVICE_UPDATE_SUCCESS = 200002;
    public const SERVICE_DELETE_SUCCESS = 200003;
    public const SERVICE_CACHE_CLEAR_SUCCESS = 200011;

    public const SERVICE_REGISTER_SUCCESS = 200101;
    public const SERVICE_LOGIN_SUCCESS = 200102;
    public const SERVICE_LOGOUT_SUCCESS = 200103;
    public const SERVICE_PAGE_SYNC_SUCCESS = 200301;

    // 客户端错误码：400 ~ 499 开头，后拼接 3 位
    public const CLIENT_PARAMETER_ERROR = 400001;
    public const CLIENT_CREATED_ERROR = 400002;
    public const CLIENT_DELETED_ERROR = 400003;

    public const CLIENT_VALIDATION_ERROR = 422001; // 表单验证错误

    // 服务端操作错误码：500 ~ 599 开头，后拼接 3 位
    public const SYSTEM_ERROR = 500001;
    public const SYSTEM_UNAVAILABLE = 500002;
    public const SYSTEM_CACHE_CONFIG_ERROR = 500003;
    public const SYSTEM_CACHE_MISSED_ERROR = 500004;
    public const SYSTEM_CONFIG_ERROR = 500005;

    // 业务操作错误码（外部服务或内部服务调用...）
    public const SERVICE_REGISTER_ERROR = 500101;
    public const SERVICE_LOGIN_ERROR = 500102;
}
